export PATH := $(shell npm bin):$(PATH)

default:
	npm run build

clean:
	@rm -rf js/bin css bower_components fonts
