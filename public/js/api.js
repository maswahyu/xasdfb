var Api = Object({
    _api_url: window.game_endpoint,
    _api_access_token: window.api_token,
    _api_refresh_token: '',
    _user: {
        id_user: undefined,
        name: 'user',
        highscore: 0,
        lastPlayed: '2000-01-01',
        canPlay: false
    },
    _settings: {
        pola: [
            1, 2, 3, 4, 5
        ],
        kecepatan: 5,
        interval_pola: 30,
        interval_kemunculan: 0.25,
        jarak_obs_min: 350,
        random_jarak_add: 200,
        heart: 3,
        score_value: 20,
        score_interval: 3,
        score_max: 1000,
        timer: 150
    },
    _initialized: false,
    _initializing: false,
    _logged_in: false,
    _sandbox_mode: false,

    /**
     * Init API panggil dengan parameter callback
     * @param {*} cb callback yg akan dipanggil setelah init selesai, dengan parameter isSuccess(boolean)
     */
    init: function(cb) {

        let testMode = false;
        var diz = this;

        if (this._initialized || this._initializing) { return; }
        if (typeof $ === typeof undefined) {
            //console.log|("jQuery not found!");
            return;
        }

        this._initialized = false;
        this._initializing = true;

        var fetchUserData = function() {
            //console.log("fetchUserData");
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + diz._api_access_token);
                },
                url: diz._api_url + 'game/agent/',
                type: 'GET'
            })
            .done(function(resData) {
                if (typeof resData.meta !== typeof undefined
                 && typeof resData.meta.status !== typeof undefined
                 && resData.meta.status === false) {
                    // console.log('Failed parse data from server' + resData.meta.message);
                } else {
                    diz._user = resData;
                    diz._user.canPlay = true;
                    diz._initialized = true;
                    diz._logged_in = true;
                }
            })
            .fail(function(resData) {
                //console.log('EDUCALOG | Failed get data from server: ' + resData.status);
            })
            .always(function() {
                diz._initializing = false;
                if (typeof cb !== typeof undefined) {
                    cb(diz._initialized);
                }
            });
        };
            fetchUserData();
    },
    enableSanbox: function() {
        this._user.canPlay = true
        this._sandbox_mode = true
    },
    isInitialized: function() {
        return this._initialized
    },


    // get game settings
    getSettingGame: function(key) {
        if (typeof this._settings[key] === typeof undefined) {
            //console.log("Getting undefined setting: "+ key);
            return undefined;
        }
        return this._settings[key];
    },

    // get user data
    isLoggedIn: function() {
        return this._logged_in;
    },
    isCanPlay: function() {
        return this._user.canPlay;
    },
    getUserData: function(key) {
        if (typeof this._user[key] === typeof undefined) {
            //console.log("Getting undefined user data: "+ key);
            return undefined;
        }
        return this._user[key];
    },

    // set score
    _settingscore: false,
    /**
     * Init API panggil dengan parameter callback
     * @param {*} score
     * @param {*} cb callback yg akan dipanggil setelah init selesai, dengan parameter isSuccess(boolean)
     */
    setUserScore: function(score, cb) {

        if (this._sandbox_mode) { return }

        if (this._settingscore) { return }

        if (typeof this._user.id_user === typeof undefined) {
            //console.log("Undefined user");
            return;
        }

        this._settingscore = true;
        var diz = this;
        $.ajax({
            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + diz._api_access_token);
            },
            url: diz._api_url +'game/point/',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                user_id: diz._user.id_user,
                score:score,
                platform: 'MY_POINT'
            })
        })
        .done(function(res) {
            if (typeof cb !== typeof undefined) {
                cb(true);
            }
        })
        .fail(function(res) {
            //console.log('Cannot contact server');
            if (typeof cb !== typeof undefined) {
                cb(false);
            }
        })
        .always(function() {
            diz._settingscore = false;
        })
    },


    // callback Home Button on Dialog Result
    homeButtonCb: function(){

        console.log("DEBUG | Home button pressed!");
        // when user not legged in
        if (this._sandbox_mode) {
            window.location.href = `/game-profile`;
        }
        else {
            window.location.href = `/game-profile?score=${this.parent.scene.scoreCount}`;
        }
    }
});
