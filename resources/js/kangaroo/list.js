'use strict';
import kangarooRest from '../rest/kangaroo';

(function () {
  const oKangarooList = {
    dom: {
      gridContainer: $('#gridContainer'),
      btnAdd       : $('#btnAdd'),
      btnUpdate    : $('#btnUpdate'),
      btnDedlete   : $('#btnDelete')
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
      this.initilizeDataGrid();
    },

    bindEventListeners: function () {
      this.dom.btnAdd.click(this.addClicked.bind(this));
      this.dom.btnUpdate.click(this.updateClicked.bind(this));
      this.dom.btnDedlete.click(this.deleteClicked.bind(this));
    },

    initilizeDataGrid: async function () {
      await this.getRecords();
      this.dom.gridContainer.dxDataGrid({
        dataSource: this.data.kangaroos,
        keyExpr   : 'id',
        columns: [
          { 
            dataField: 'name',
            caption: 'Name'
          },
          { 
            dataField: 'birth_date',
            caption: 'Birthday'
          },
          { 
            dataField: 'weight',
            caption: 'Weight'
          },
          { 
            dataField: 'height',
            caption: 'Height'
          },
          { 
            dataField: 'nature',
            caption: 'Friendliness'
          }
        ],
        paging: {
          pageSize: 10
        },
        pager: {
          visible: true,
          allowedPageSizes: [5, 10, 20],
          showPageSizeSelector: true,
          showInfo: true,
          showNavigationButtons: true,
        },
        filterRow: {
          visible: true,
          applyFilter: 'auto',
        },
        searchPanel: {
          visible: true,
          width: 240,
          placeholder: 'Search...',
        },
        headerFilter: {
          visible: true,
        },
        showBorders: true,
        selection: {
          mode: 'single'
        },
        onSelectionChanged: this.dataGridOnChange.bind(this)
      });
    },

    dataGridOnChange: function ({ selectedRowsData }) {
      if (selectedRowsData[0]) {
        this.data.selectedRow = selectedRowsData[0];
      }
    },

    getRecords: async function () {
      try {
        this.data.kangaroos = await kangarooRest.getAll();
      } catch (e) {
        alert('An error occured while trying to get the records.');
        console.error(e);
      }
    },

    addClicked: function (e) {
      e.preventDefault();
      if (confirm('Do you want to add new record?')) {
        location.replace(this.routes.create);
      }
    },
    
    updateClicked: function (e) {
      e.preventDefault();
      if (!this.data.selectedRow) alert('Please select from the table which record to update.');

      const { name, id } = this.data.selectedRow;
      if (confirm(`Do you want to update the record of ${name}?`)) {
        location.replace(this.routes.update + id);
      }
    },

    deleteClicked: async function (e) {
      e.preventDefault();
      if (!this.data.selectedRow) alert('Please select from the table which record to delete.');

      const { name, id } = this.data.selectedRow;
      if (confirm(`Do you want to delete the record of ${name}?`)) {
        try {
          const { message } = await kangarooRest.delete(id);
          alert(message);
          this.initilizeDataGrid();
        } catch (e) {
          alert('An error occured while trying to delete the record.');
          console.error(e);
        }
      }
    }
  };
  
  oKangarooList.init();

})();