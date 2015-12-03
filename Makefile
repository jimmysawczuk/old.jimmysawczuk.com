export PATH := $(shell npm bin):$(PATH)

default:
	@bower install
	@npm install
	@grunt

clean:
	@rm -rf js/bin css node_modules bower_components fonts
