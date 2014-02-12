default:
	@lessc less/style.less css/style.css
	@yuicompressor -o css/style.min.css css/style.css

	@git add css/style.min.css
	@git add css/style.css
