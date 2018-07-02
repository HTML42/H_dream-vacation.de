var Xtreme_startup_calls = Xtreme_startup_calls || [];
Xtreme_startup_calls.push(function () {
    //
    list_length();
    //
    $('#navi_toggler').click(function () {
        $('#navigation ul').toggleClass('active');
    });
    //
    //###GDPR related Scripts
    window.gx = new GDPRX('en');
    gx.add_script(GX_predefined.analytics('UA-121676401-1', null, 'de'));
    gx.startup();
});
