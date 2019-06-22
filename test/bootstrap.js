//////////////////////////////////////////////
/// Things to check before reaching out
/// 1). Check the files
/// 2). Check api routes
/// 3). Check the pages
/// 4). Check the DNS
/// 5). Check the SSL
//////////////////////////////////////////////


const puppeteer = require('puppeteer');
const { expect } = require('chai');

const _ = require('lodash');
const globalVariables = _.pick(global, ['browser', 'expect']);

// puppeteer options
const opts = {
  headless: true,
  timeout: 10000
};

// expose variables
before (async function () {
  global.expect = expect;
  global.browser = await puppeteer.launch(opts);
});

// close browser and reset global variables
after (function () {
  browser.close();

  global.browser = globalVariables.browser;
  global.expect = globalVariables.expect;
});