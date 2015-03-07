var mongoose = require("mongoose");
var Appointment = mongoose.model("Appointment");

module.exports =(function() {
	return {
		create: function(req, res) {
			var errors = [];
			
			if(req.body.complain.length < 10 ) {
				errors.push({ error: "Complain should be at least 10 characters." });
			}

			var now = new Date();
			if(req.body.date < now.toISOString()) {
				errors.push({ error: "Schedule time should be the future date" });
			}

			console.log("\n", req.body.patientName);

			// new format for date search
			var newDate = new Date(req.body.date);

			Appointment.find({date: newDate}, function(err, result) {
				if(result.patientName == req.body.patientName
					&& result.created_at == newDate) {
					console.log(result_created_at);
					// errors.push("can only set-up 1 appointment per day");
				}
				if(result.length >= 3 ) {
					errors.push({ error: "make different day, already occupied." });
					console.log(errors);
					res.json(errors);
				}
				else {
					// success to validate
					if(errors.length <= 0 ) {
						var newAppointment = new Appointment(req.body);
						newAppointment.save(function(err, result) {
							if(!err) {
								console.log("success to save a new appointment\n", result);
								res.json(result);
							}
						});	
					}
					else {
						res.json(errors);
					}
				}
			});
		},
		read: function(req, res) {
			Appointment.find({}, function(err, result) {
				if(!err) {
					res.json(result);
				}
			})
		},
		delete: function(req, res) {
			// console.log(req.params.id);
			Appointment.remove({_id: req.params.id}, function(err) {
				if(!err) {
					res.end();
				}
			});
		}
	}
})();