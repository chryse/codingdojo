var connection = require("connect");
var server = require("serve-static");
connection().use(server(__dirname)).listen(8011);
