<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

class Transaction extends CI_Controller {
		
	private $excel;
		
	public function __construct()
	{
		parent::__construct();

		if (!isLogin()) {
			redirect('auth');
		}

		if (!isAdmin()) {
			redirect('/');
		}

		if (!haveAddress()) {
			redirect('/admin/profile');
		}

		$this->load->model('admin/Transaction_model', 'transaction');
		$this->excel = new PHPExcel();
	}

	public function index()
	{
		$data['title'] = 'Transaksi';
		$this->load->view('admin/transaction/index', $data);
	}

	public function detailTrasaction()
	{
		$data['title'] = 'Detail transaksi';
		$this->load->view('admin/transaction/detail', $data);
	}

	public function getTransactions()
	{
		$data = $this->input->get(null, true);
		
		$result = $this->transaction->getTransactions($data);

		response($result, true);
	}

	public function getTransactionWithProof()
	{
		$data = $this->input->get(null, true);
		
		$result = $this->transaction->getTransactionWithProof($data);

		response($result, true);
	}

	public function getDetailTransaction()
	{
		$idTransaction = $this->input->get('id', true);

		$result = $this->transaction->getDetailTransaction($idTransaction);
		
		response($result, true);
	}

	public function changeTransactionStatus()
	{
		$data = $this->input->post(null, true);

		$result = $this->transaction->changeTransactionStatus($data);
		
		response($result, true);
	}

	public function changeTransactionProofStatus()
	{
		$data = $this->input->post(null, true);

		$result = $this->transaction->changeTransactionWithProof($data);

		response($result, true);
	}

	public function checkOldTransaction()
	{
		$result = $this->transaction->checkOldTransaction();

		response($result, true);
	}

	public function downloadTransaction()
	{
		$data = $this->input->get(null, true);
		
		$result = $this->transaction->downloadTransaction($data);

		if ($result['code'] !== 200) {
			response($result);
		}

		$transactionData = $result['data'];

		$style_col = [
			'font' => ['bold' => true],
      'alignment' => [
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ],
      'borders' => [
          'top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN]
      ]
		];

    $style_row = [
        'alignment' => [
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ],
        'borders' => [
          'top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN]
        ]
    ];

    $this->phpExcelConfig($data, $style_row, $style_col);

    $fileName = $this->getStatus($data['status']) . " - " . date("YmdHis");

		$columns = [
			[
        "col" => [
          "index" => "A",
          "label" => "No",
          "length" => 5
        ]
      ],
      [
        "col" => [
          "index" => "B",
          "label" => "Kode Transaksi",
          "length" => 33
        ]
      ],
      [
        "col" => [
          "index" => "C",
          "label" => "Nama customer",
          "length" => 21
        ]
      ],
      [
        "col" => [
          "index" => "D",
          "label" => "Status Transaksi",
          "length" => 15
        ]
      ],
      [
        "col" => [
          "index" => "E",
          "label" => "Produk",
          "length" => 55
        ]
	    ],
      [
        "col" => [
          "index" => "F",
          "label" => "Jumlah transaksi",
          "length" => 20
        ]
      ],
      [
        "col" => [
          "index" => "G",
          "label" => "Dibuat tanggal",
          "length" => 18
        ]
      ],
      [
        "col" => [
          "index" => "H",
          "label" => "diubah tanggal",
          "length" => 19
        ]
      ],          
    ];

		foreach ($columns as $column) {
      $this->excel->setActiveSheetIndex(0)->setCellValue($column["col"]["index"] . "3", $column["col"]["label"]);
      $this->excel->getActiveSheet()->getStyle($column["col"]["index"] . "3")->applyFromArray($style_col);
      $this->excel->getActiveSheet()->getColumnDimension($column["col"]["index"])->setWidth($column["col"]["length"]);
      $this->excel->getActiveSheet()->getRowDimension(3)->setRowHeight(22);
    }

    $numbering = 1;
    $excelRow = 4;
    foreach ($transactionData as $transactionIndex => $data) {
      $this->excel->setActiveSheetIndex(0)->setCellValue('A' . $excelRow, $numbering);
      $this->excel->getActiveSheet()->getStyle('A' . $excelRow)->applyFromArray($style_row);
			$keyItem = array_keys($data);
			$index = 0;

      foreach ($columns as $columnKey => $columnData) {
      	if ($columnKey == 0) continue;
      	else {
      		if($columnKey == 3) {
        	 	$data[$keyItem[$index]] = $this->getStatus($transactionData[$transactionIndex]['status']);
        	}
	        $this->excel->setActiveSheetIndex(0)
	        		->setCellValue($columnData["col"]["index"] . $excelRow, $data[$keyItem[$index]]);
	        $this->excel->getActiveSheet()->getStyle($columnData["col"]["index"] . $excelRow)->applyFromArray($style_row);
	        $index += 1;
      	}
      }

      $numbering++;
      $excelRow++;
    }

    $this->excel->getActiveSheet()
    						->getDefaultRowDimension()
    						->setRowHeight(-1);
    $this->excel->getActiveSheet()
    						->getPageSetup()
        				->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    $this->excel->getActiveSheet(0)->setTitle($this->getStatus($data['status']));
    $this->excel->setActiveSheetIndex(0);

 		$write = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
		ob_end_clean();
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="'.$fileName.'.xlsx"');
    header('Cache-Control: max-age=0');
    $write->save('php://output');
    exit();
	}

	private function phpExcelConfig($data, $style_row, $style_col)
	{
    $this->excel->getProperties()
	 			->setCreator('Koperasi Salimah')
        ->setLastModifiedBy('Admin koperasi salimah')
        ->setTitle($this->getStatus([$data['status']]))
        ->setSubject('TRANSAKSI')
        ->setDescription("Menampilkan daftar transaksi produk diurutkan dari yang terbaru")
        ->setKeywords("Transaksi, Produk");

  	$startDateRaw = $data['start_date'] ?: date("Y-m-d", strtotime('-15 days'));
    $endDateRaw =  $data['end_date'] ?: date("Y-m-d H:i:s");

    $startDate = date_create($startDateRaw);
    $endDate = date_create($endDateRaw . " 23:59:59");

    $dateTitle = date_format($startDate, "d/m/Y") . " - " . date_format($endDate, "d/m/Y");

    $style_col = [
			'font' => ['bold' => true],
      'alignment' => [
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ],
      'borders' => [
          'top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN]
      ]
		];

    $style_row = [
        'alignment' => [
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        ],
        'borders' => [
          'top' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'right' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'bottom' => ['style'  => PHPExcel_Style_Border::BORDER_THIN],
          'left' => ['style'  => PHPExcel_Style_Border::BORDER_THIN]
        ]
    ];

    $this->excel->setActiveSheetIndex(0)
    						->setCellValue('A1', $this->getStatus($data['status']));
		$this->excel->getActiveSheet()->mergeCells('A1:H1');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()
        				->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->setActiveSheetIndex(0)
    						->setCellValue('A2', $dateTitle);
		$this->excel->getActiveSheet()->mergeCells('A2:H2');
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);
		$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()
        				->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	}

	private function getStatus($statusNumber) {
		switch ($statusNumber) {
			case '-1':
			case -1:
        return "Semua transaksi";
      case '0':
      case 0:
        return "Belum Bayar";
      case '1':
      case 1:
        return "Terverifikasi";
      case '2':
      case 2:
        return "Diproses";
      case '3':
      case 3:
        return "Dikirim";
      case '4':
      case 4:
        return "Diterima";
      case '5':
      case 5:
        return "Pesanan dibatalkan";
      default:
        return "Error";
    }
	}

}

/* End of file Transaction.php */
