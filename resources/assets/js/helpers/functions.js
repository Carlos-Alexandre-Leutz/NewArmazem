export var phoneBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
};

export var phoneOptions = {
  onKeyPress: function (val, e, field, options) {
    field.mask(phoneBehavior.apply({}, arguments), options);
  }
};

export var validateEmail = function (email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
};