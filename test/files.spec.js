const chai      = require('chai');
const chaiFiles = require('chai-files');
const expect    = chai.expect;
const file      = chaiFiles.file;
const dir       = chaiFiles.dir;
chai.use(chaiFiles);

describe("Check .htaccess", function() {
  it("should be able find a .htaccess file", function() {
    expect(file('.htaccess')).to.exist;
  });
  it(".htaccess file should match the example ", function() {
    expect(file('.htaccess')).to.equal(file('test/.htaccess'));
  });
});

describe("Check WP core files match", function() {
  it("wp-config.php file should match the test ", function() {
    expect(file('wp-config.php')).to.equal(file('test/wp-config.php'));
  });
});

describe("Check if WP core folders exist", function() {
  it("wp-admin should exist", function() {
    expect( dir('wp-admin')).to.exist;
  });
  it("wp-content should exist", function() {
    expect( dir('wp-content')).to.exist;
  });
  it("wp-includes should exist", function() {
    expect( dir('wp-includes')).to.exist;
  });

  it("plugins should exist", function() {
    expect( dir('wp-content/plugins')).to.exist;
  });
  it("themes should exist", function() {
    expect( dir('wp-content/themes')).to.exist;
  });
});