//////////////////////////////////////////////
/// Things this test should do
/// 1). Run break1.php and check that all actions were taken
/// 2). Run break2.php and check that all actions were taken
/// 3). Run break3.php and check that all actions were taken
/// 4). Run break4.php and check that all actions were taken
/// 5). Run break5.php and check that all actions were taken
//////////////////////////////////////////////

// const {browser, newPage} = require('puppeteer');

describe('Test the 1st exercise', function () {
  let page;
  

  before (async function () {
    page = await browser.newPage();
    await page.goto('http://localhost:8000/break1.php');
  });

  after (async function () {
    await page.close();
  })

  it('should have the correct title', async function () {
    expect(await page.title()).to.eql('"WordPress 101: Use Tests/Git to check WP core files"');
  });

  it('should click the button', async function () {
    // await page.goto(`${opts.appUrl}/login`);
    await page.click("input.btn");
    // await page.type("test@test.com")
    // await page.click("[name=password]");
    // await page.type("testing");
    // await page.click("[type=submit]");


    const HEADING_SELECTOR = 'h1';
    let heading;
    await page.waitFor(HEADING_SELECTOR);
    heading = await page.$eval(HEADING_SELECTOR, heading => heading.innerText);
    expect(heading).to.eql('"Your WordPress site has been broken!"');
  })


  it('should click the button', async function () {
    await page.click('input.btn');
    // await page.$eval( 'input.btn', button => {
    //   button.click();
    // });

    const HEADING_SELECTOR = 'h1';
    let heading;
    await page.waitFor(HEADING_SELECTOR);
    heading = await page.$eval(HEADING_SELECTOR, heading => heading.innerText);
    expect(heading).to.eql('"Your WordPress site has been broken!"');
  });

  // it( 'Browser Closes Successfully', async () => {
  //   await browser.close();
  // });
});


