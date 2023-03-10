'use strict';

import kangarooRest from '../rest/kangaroo.rest';
import kangarooSchema from '../validations/kangaroo.schema';
import Validator from 'validatorjs';
import en from 'validatorjs/src/lang/en';


(function () {
    const kangarooFormPage = {
        dom : {
            txtId       : $('#recordId'),
            txtName     : $('#recordName'),
            txtNickname : $('#recordNickname'),
            txtWeight   : $('#recordWeight'),
            txtHeight   : $('#recordHeight'),
            txtColor    : $('#recordColor'),
            txtBirthDate: $('#recordBirthDate'),
            selGender   : $('#recordGender'),
            selNature   : $('#recordNature'),
            btnSave     : $('#btnSave'),
            btnCancel   : $('#btnCancel')
        },

        routes: {
            list: '/kangaroo'
        },

        restOperation: 'insert',

        init: function () {
            Validator.setMessages('en', en);
            this.bindEventListener();
        },

        bindEventListener: function () {
            this.dom.btnSave.click(this.saveClicked.bind(this));
            this.dom.btnCancel.click(this.cancelClicked.bind(this));
        },

        prepareData: function () {
            const { dom } = this;
            const data    = {
                name      : dom.txtName.val(),
                nickname  : dom.txtNickname.val(),
                weight    : dom.txtWeight.val(),
                height    : dom.txtHeight.val(),
                color     : dom.txtColor.val(),
                birth_date: dom.txtBirthDate.val(),
                gender    : dom.selGender.val(),
                nature    : dom.selNature.val()
            };

            if (dom.txtId.length === 1) {
                data.id            = dom.txtId.val();
                this.restOperation = 'update';
            }

            return this.validateData(data);
        },

        validateData: function(data) {
            const validation = new Validator(data, kangarooSchema);

            if (validation.passes() === false) {
                const { errors } = validation;
                const errorField = Object.keys(errors.all()).pop();
                alert(errors.first(errorField));
                return false;
            }

            return data;
        },

        saveClicked: async function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to create this record?') === false) return;

            const data = this.prepareData();
            if (data === false) return;

            try {
                const response   = await kangarooRest[this.restOperation](data);
                if (response?.error) {
                    alert(response.error.message);
                    return;
                }

                alert(response.message);
                location.replace(this.routes.list);
            } catch (e) {
                alert('An error occurred while trying to save the record');
            }
        },

        cancelClicked: function (e) {
            e.preventDefault();
            if (confirm('Do you really want to cancel? Cancelling will return you to List page.')) {
                location.replace(this.routes.list);
            }
        }

    };

    kangarooFormPage.init();

})();