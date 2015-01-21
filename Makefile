default:
	@lessc less/style.less css/style.css
	@cleancss -o css/style.min.css css/style.css
