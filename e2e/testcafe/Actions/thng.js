import config from '../config';

import login from '../pageObject/login';
import dashboard from '../pageObject/dashboard';
import thngs from '../pageObject/thngs';

import helper from '../Helpers/generateThng';

const thng = helper.randomThng();

fixture `Start`
    .page `${config.url}login`
    .beforeEach( async t => {
        await t.resizeWindow(1920, 1080);
        await login.login(config.username, config.password);
    });

test('Create a thng', async t => {
    await dashboard.moveToThngsPage();
    await thngs.addNewThng(thng);
});

test('Delete a thng', async t => {
    await dashboard.moveToThngsPage();
    await thngs.deleteThng(thng);
});

