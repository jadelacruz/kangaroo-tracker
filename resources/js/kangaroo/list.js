'use strict';
import kangarooRest from '../rest/kangaroo.rest';
import dataGridConfiguration from './data.grid';

(function () {
    const kangarooListPage = {
        dom: {
            gridContainer: $('#gridContainer'),
            btnAdd       : $('#btnAdd'),
            btnUpdate    : $('#btnUpdate'),
            btnDelete    : $('#btnDelete')
        },

        routes: {
            create: '/kangaroo/create',
            update: '/kangaroo/edit/'
        },

        data: {
            kangaroos  : [],
            selectedRow: null,
        },

        init: function () {
            this.bindEventListeners();
            this.loadDataGrid();
        },

        bindEventListeners: function () {
            this.dom.btnAdd.click(this.addClicked.bind(this));
            this.dom.btnUpdate.click(this.updateClicked.bind(this));
            this.dom.btnDelete.click(this.deleteClicked.bind(this));
        },

        loadDataGrid: async function () {
            await this.getRecords();
            this.dom.gridContainer
                .dxDataGrid(
                    dataGridConfiguration('id', this.data.kangaroos, { onSelectionChanged: this.dataGridOnChange.bind(this) })
                );
        },

        dataGridOnChange: function ({ selectedRowsData }) {
            if (selectedRowsData.length !== 0) {
                this.data.selectedRow = selectedRowsData.pop();
            }
        },

        getRecords: async function () {
            try {
                this.data.kangaroos = await kangarooRest.getAll();
            } catch (e) {
                alert('An error occurred while trying to get the records.');
            }
        },

        addClicked: function (e) {
            e.preventDefault();
            location.replace(this.routes.create);
        },

        updateClicked: function (e) {
            e.preventDefault();
            const { selectedRow } = this.data;

            if (!selectedRow) {
                alert('Please select from the table which record to update.');
                return;
            }

            if (confirm(`Do you want to update the record of ${selectedRow.name}?`)) {
                location.replace(this.routes.update + selectedRow.id);
            }
        },

        deleteClicked: async function (e) {
            e.preventDefault();
            if (!this.data.selectedRow) {
                alert('Please select from the table which record to delete.');
            }

            const { name, id } = this.data.selectedRow;
            if (confirm(`Do you want to delete the record of ${name}?`)) {
                try {
                    this.data.selectedRow = null;
                    const response = await kangarooRest.delete(id);
                    const message  = response?.error?.message || response?.message;
                    alert(message);
                    this.loadDataGrid();
                } catch (e) {
                    alert('An error occurred while trying to delete the record.');
                }
            }

        }
    };

    kangarooListPage.init();

})();