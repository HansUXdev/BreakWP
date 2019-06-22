//////////////////////////////////////////////
/// Things this test should do
/// 1). Run break1.php and check that all actions were taken
/// 2). Run break2.php and check that all actions were taken
/// 3). Run break3.php and check that all actions were taken
/// 4). Run break4.php and check that all actions were taken
/// 5). Run break5.php and check that all actions were taken
//////////////////////////////////////////////


describe('Check the break.php files', function () {
  let page;

  before (async function () {
    page = await browser.newPage();
    await page.goto('http://localhost:8000');
  });

  after (async function () {
    await page.close();
  })

  it('should have the correct page title', async function () {
    // expect(await page.title()).to.eql('DockerWP – Just another WordPress site');
  });

  // it('should have a heading', async function () {
  //   const HEADING_SELECTOR = 'h1';
  //   let heading;
  //   await page.waitFor(HEADING_SELECTOR);
  //   heading = await page.$eval(HEADING_SELECTOR, heading => heading.innerText);
  //   expect(heading).to.eql('Page Title');
  // });


});


