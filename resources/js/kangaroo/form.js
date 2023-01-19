'use strict';
import kangarooRest from '../rest/kangaroo';

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

        init: function () {
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
                data.id = dom.txtId.val();
            }

            return data;
        },

        saveClicked: async function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to create this record?') === false) return;

            let response;
            const data = this.prepareData();
            try {
                if (!data.hasOwnProperty('id')) { // add
                    response = await kangarooRest.insert(data);
                } else { // update
                    response = await kangarooRest.update(data.id, data);
                }
                
                if (response?.error) {
                    alert(response.error.message);
                    return
                }

                alert(response.message);
                location.replace('/kangaroo');
            } catch (e) {
                alert('An error occured while trying to save the record;')
                console.error(e);
            }
        },

        cancelClicked: function (e) {
            e.preventDefault();
            if (confirm('Do you really want to cancel? Cancelling will return you to List page.')) {
                location.replace('/kangaroo');
            }
        }

    };

    kangarooFormPage.init();

})();