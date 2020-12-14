define([
    'Magento_Ui/js/form/form'
], function(Component) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();
            return this;
        },

        onSubmit: function() {
            // trigger form validation
            this.source.set('params.invalid', false);
            this.source.trigger('orderCustomNumberForm.data.validate');

            // verify that form data is valid
            if (!this.source.get('params.invalid')) {
                var formData = this.source.get('orderCustomNumberForm');
            }
        }
    });
});
