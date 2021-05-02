const global = {
	base_url: $('#base-url').val(),
	loading: function (element, color, isLoading, content) {
		if (isLoading) {
			$(`#${element}`)
				.removeClass(`btn-${color}`)
				.addClass(`btn-gradient-${color}`)
				.attr("disabled", true)
				.html("")
				.prepend(
					'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
				);
		} else {
			$(`#${element}`)
				.removeClass(`btn-gradient-${color}`)
				.addClass(`btn-${color}`)
				.removeAttr("disabled")
				.html(content);
			$(`#${element}`).find("span:first").remove();
		}
	}
};
