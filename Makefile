export PATH := $(shell npm bin):$(PATH)

default:
	@npm install
	@grunt

clean:
	@rm -rf js/bin css
