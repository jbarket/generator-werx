'use strict';

var path = require('path');
var assert = require('yeoman-generator').assert;
var helpers = require('yeoman-generator').test;

describe('Package:validator', function () {
  before(function (done) {
    helpers.run(path.join(__dirname, '../validator'))
      .withArguments('name', '--force')
      .withOptions({ 'skip-install': true })
      .on('end', done);
  });

  it('creates files', function () {
    assert.file([
      'validator.php'
    ]);
  });
});
