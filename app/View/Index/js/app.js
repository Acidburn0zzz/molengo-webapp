app = {};
app.page = {};

/**
 * Fix for open modal is shifting body content to the left #9855
 */
$.fn.modal.Constructor.prototype.setScrollbar = function() {
};

