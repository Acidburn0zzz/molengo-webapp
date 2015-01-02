/**
 * Index
 * 
 * @param {Object} options
 */
app.page.Index = function Index(options) {

    // this object
    var $this = this;

    /**
     * init 
     * @returns {boolean}
     */
    this.init = function() {
        return true;
    };

    // load content
    this.load = function() {
        $d.showLoad();
        $d.rpc('index.load', function(res) {

            if (!$d.handleResponse(res)) {
                return;
            }

            // load table rows
            if (res.result.status === 1) {
                $d.notify({
                    msg: "<b>Ok</b> Loaded successfully!",
                    type: "success",
                    position: "center"
                });
            } else {
                $d.alert('Server error');
            }
        });
    };

    this.init();
};

$(function(params) {
    var obj = new app.page.Index();
    obj.load(params);
});