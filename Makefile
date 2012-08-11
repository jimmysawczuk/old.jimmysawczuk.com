default:
	@lessc less/style.less css/style.css
	@lessc css/style.css css/style.min.css

	@git add css/style.min.css
	@git add css/style.css