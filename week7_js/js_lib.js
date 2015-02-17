var _ = (function() {
	return {
		map: function(obj, callback) {
			var result = [];
			if(Array.isArray(obj)) {
				for(var i = 0; i < obj.length; i++) {
					result.push(callback(obj[i]));
				}			
			}
			else {
				for(var key in obj) {
					result.push(callback(obj[key]));
				}
			}
			return result;
			
		},
		reduce: function(obj, callback, initialValue) {
			var memo = initialValue;
			if(Array.isArray(obj)) {
				for(var i = 0; i < obj.length; i++) {
					memo = callback(memo, obj[i]);
				}
				
			}
			else {
				for(var key in obj) {
					memo = callback(memo, obj[key]);
				}
			}
			return memo;
		},
		find: function(obj, callback) {
			if(Array.isArray(obj)) {
				for(var i = 0; i < obj.length; i++) {
					return callback(obj[i]);
				}
			}
			else {
				for(var key in obj) {
					callback(obj[key]);
				}
			}
		},
		filter: function() {

		},
		reject: function() {

		}
	}
})();