(() => {
  addEventListener('show.bs.modal', (e) => {
    console.log(e);
  });
  
  const customers = [{
      id: 1,
      name: 'Super Mart of the West',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
      
    }, {
      id: 2,
      name: 'Super Mart of the West1',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 3,
      name: 'Super Mart of the West2',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 4,
      name: 'Super Mart of the West3',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 5,
      name: 'Super Mart of the West4',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 6,
      name: 'Super Mart of the West5',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 7,
      name: 'Super Mart of the West6',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 8,
      name: 'Super Mart of the West7',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 9,
      name: 'Super Mart of the West8',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 10,
      name: 'Super Mart of the West9',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 11,
      name: 'Super Mart of the West11',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
    }, {
      id: 12,
      name: 'Super Mart of the West12',
      nickname: 'Sample NickName',
      weight: 'Bentonville',
      height: 'Arkansas',
      gender: 'Male',
      color: 'Test',
      nature: 'Friendly',
      birth_date: '1995-12-22',
  }];

  $('#gridContainer').dxDataGrid({
      dataSource: customers,
      keyExpr   : 'id',
      columns   : [ 
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
      onSelectionChanged: ({ selectedRowsData }) => {
        const oSelectedData = selectedRowsData[0];
        if (oSelectedData) {
          console.log(oSelectedData);
        }
      }
  });
})();