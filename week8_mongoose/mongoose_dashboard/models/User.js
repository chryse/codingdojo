var mongoose = require("mongoose"),
	bcrypt = require("bcrypt"),
	SALT_WORK_FACTOR = 10;

var UserSchema = new mongoose.Schema({
	email: { type: String, required: true, index: { unique: true} },
	first_name: { type: String, required: true },
	last_name: { type: String, required: true },
	password: { type: String, required: true },
	created_at: { type: Date, default: Date.now},
	user_level : { type: Number },
	description: { type: String },
	message: { type: String }
});

// UserSchema.path("email").required(true, "email cannot be blank");
// UserSchema.path("first_name").required(true, "first name cannot be blank");
// UserSchema.path("last_name").required(true, "last name cannot be blank");
// UserSchema.path("password").required(true, "password cannot be blank");


UserSchema.pre('save', function(next) {
    var user = this;

    // only hash the password if it has been modified (or is new)
    if (!user.isModified('password')) return next();

    // generate a salt
    bcrypt.genSalt(SALT_WORK_FACTOR, function(err, salt) {
        if (err) return next(err);

        // hash the password using our new salt
        bcrypt.hash(user.password, salt, function(err, hash) {
            if (err) return next(err);

            // override the cleartext password with the hashed one
            user.password = hash;
            next();
        });
    });
});

UserSchema.methods.comparePassword = function(candidatePassword, cb) {
    bcrypt.compare(candidatePassword, this.password, function(err, isMatch) {
        if (err) return cb(err);
        cb(null, isMatch);
    });
};	

module.exports = mongoose.model("User", UserSchema);


