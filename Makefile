default:
	@lessc less/style.less css/style.css
	@yuicompressor -o css/style.min.css css/style.css
