
//////////////////////////////////////////////
/// https://www.chaijs.com/plugins/chai-files/
///
/// Things this test should do
/// 1). Read docker-compose.yml
/// 2). Grab username and password from the file
/// 3). Compare the file to to wp-config.php
/// 4). Check if core files exist and the expected file size
/// 5). Check if wp-admin, wp-content and wp-include folders exist
/// 6). Check if a .htaccess file exists and compare the content 
/// (move to seperate test later)
//////////////////////////////////////////////


const  chai  = require('chai');
const chaiFiles = require('chai-files');
const expect = chai.expect;
const file = chaiFiles.file;
const dir = chaiFiles.dir;
chai.use(chaiFiles);

// fs.readFile(__dirname + '/../../foo.bar');

describe("Check .htaccess", function() {
  it("should be able to load .htaccess file", function() {
    expect(file('package.json')).to.exist;
    // expect(fs.readFileSync('package.json').toString()).to.equal('...')
  });
  //// later consider reading the file
  //// check for odd or breaking htaccess things like redirects, etc.
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

  it("wp-content should exist", function() {
    expect( dir('wp-content')).to.exist;
    expect( dir('wp-content/plugins')).to.exist;
    expect( dir('wp-content/themes')).to.exist;
  });

  it("wp-content should exist", function() {
    expect( dir('wp-content')).to.exist;
    expect( dir('wp-content/plugins')).to.exist;
    expect( dir('wp-content/themes')).to.exist;
  });
  // it("folder should exist", function() {
  //   expect( dir(__dirname+'../Other')).to.exist;
  // });
  //// later consider reading the file
  //// check for odd or breaking htaccess things like redirects, etc.
});