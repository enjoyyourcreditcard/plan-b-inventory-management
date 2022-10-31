// import React, { useEffect, useState } from 'react';
// import ReactDOM from 'react-dom';
// import { useTable, usePagination, useGlobalFilter, useSortBy, useFilters } from 'react-table'
// import TabelFooter from '../../components/tabel_footer';
// import Table from '../../components/Table';
// import TabelHiddenColumn from '../../components/table_hidden_column';
// import TableSearch from '../../components/table_search';
// import Api from '../../utils/api';
// import Filter from '../../utils/filter';

// function MasterUserOld() {
//     const api = new Api;
//     const filter = new Filter;
//     const [rawData, setRawData] = useState([]);
//     const [loadingData, setLoadingData] = useState(true);
//     const [noStock, setNoStock] = useState(false);
//     const [data, setData] = useState([]);

//     useEffect(() => {
//         async function getData() {
//             api.getUser().then((response) => {
//                 setRawData(response.data.data)
//                 setData(response.data.data);
//                 setLoadingData(false);
//             })
//         }
//         if (loadingData) {
//             getData();
//         }
//     }, []);


//     function filterNoStock() {
//         let result = filter.noStock(noStock, rawData);
//         setData(result);
//         setNoStock(!noStock);
//     }


//     function SearchFilter(search, column) {
//         let result = filter.search(search, column, rawData);
//         setData(result);
//     }
//     function resetSearchFilter() {
//         setData(rawData);
//     }

//     const columns = React.useMemo(

//         () => [

//             {

//                 //Add this line to the column definition
//                 Header: 'Name',
//                 accessor: 'name',
//                 style: { 'maxWidth': 10 },//Add this line to the column definition
//                 Cell: tableProps => (
//                     <>
//                         <a href={"/category/" + tableProps.row.original.id} className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.name}</a>
//                     </>
//                 )
//             }, {
//                 Header: 'Email',
//                 accessor: 'email',
//                 Cell: tableProps => (
//                     <>
//                         <p style={{ "minWidth": 300 }}>{tableProps.row.original.email}</p>
//                     </>

//                 )

//             },
//             {
//                 Header: 'Status',
//                 accessor: 'status',
//                 Cell: tableProps => (
//                     <>

//                         <p>{tableProps.row.original.status}</p>



//                     </>

//                 )

//             },
//             {
//                 Header: 'Action',
//                 Cell: tableProps => (
//                     <>
//                         <button type="button" class="btn btn-danger" data-id={tableProps.row.original.id} data-toggle="modal" data-target="#modal-confirmation-deactive">
//                             Deactive
//                         </button>
//                     </>

//                 )

//             },

//         ],
//         []
//     )
//     const {
//         getTableProps,
//         getTableBodyProps,
//         headerGroups,
//         prepareRow,
//         page,
//         state,
//         canNextPage,
//         pageSize,
//         gotoPage,
//         canPreviousPage,
//         pageOptions,
//         nextPage,
//         allColumns,
//         previousPage,
//         setGlobalFilter
//     } = useTable(
//         {
//             columns,
//             data
//         },
//         useGlobalFilter, useSortBy, usePagination
//     )
//     const { globalFilter, pageIndex } = state
//     return (
//         <div>
//             <div className="pt-3 ">
//                 <div className="d-flex">
//                     <div>
//                         {/* TODO: data-bs-target dibikin props */}
//                         <button data-bs-toggle="modal" data-bs-target="#modalAddUser" class="btn btn-primary w-100">
//                             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
//                                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
//                                 stroke-linecap="round" stroke-linejoin="round">
//                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
//                                 <line x1="12" y1="5" x2="12" y2="19"></line>
//                                 <line x1="5" y1="12" x2="19" y2="12"></line>
//                             </svg>
//                             Add User
//                         </button>
//                     </div>
//                     <TableSearch
//                         columns={columns}
//                         SearchFilter={SearchFilter}
//                         resetSearchFilter={resetSearchFilter} />

//                     <div className='px-1'></div>
//                     {/* <div class="btn-group h-25 ">
//                         <button type="button" class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
//                             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
//                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
//                                 <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
//                             </svg>
//                         </button>
//                         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
//                             <button class="dropdown-item" href="#"><input type="checkbox" checked={noStock} onChange={filterNoStock} />&nbsp; No Stock</button>
//                         </div>
//                     </div>
//                     <div className='px-1'></div> */}

//                     <TabelHiddenColumn
//                         allColumns={allColumns} />
//                 </div>
//             </div>
//             {loadingData ? (
//                 <p>Loading Please wait...</p>
//             ) : (
//                 <Table
//                     getTableProps={getTableProps}
//                     prepareRow={prepareRow}
//                     getTableBodyProps={getTableBodyProps}
//                     headerGroups={headerGroups}
//                     page={page} />
//             )}


//             <TabelFooter
//                 gotoPage={gotoPage}
//                 pageIndex={pageIndex}
//                 pageOptions={pageOptions}
//                 canPreviousPage={canPreviousPage}
//                 previousPage={previousPage}
//                 canNextPage={canNextPage}
//                 nextPage={nextPage} />
//         </div>
//     );
// }

// function MasterUser() {
//     const api = new Api;
//     const filter = new Filter;
//     const [rawData, setRawData] = useState([]);
//     const [loadingData, setLoadingData] = useState(true);
//     const [noStock, setNoStock] = useState(false);
//     const [data, setData] = useState([]);

//     useEffect(() => {
//         async function getData() {
//             api.getUser().then((response) => {
//                 setRawData(response.data.data)
//                 setData(response.data.data);
//                 setLoadingData(false);
//             })
//         }
//         if (loadingData) {
//             getData();
//         }
//     }, []);

//     function filterNoStock() {
//         let result = filter.noStock(noStock, rawData);
//         setData(result);
//         setNoStock(!noStock);
//     }

//     function SearchFilter(search, column) {
//         console.log(column);
//         let result = filter.search(search, column, rawData);
//         setData(result);
//     }

//     function resetSearchFilter() {
//         setData(rawData);
//     }

//     const columns = React.useMemo(

//         () => [

//             {

//                 //Add this line to the column definition
//                 Header: 'Name',
//                 accessor: 'name',
//                 style: { 'maxWidth': 10 },//Add this line to the column definition
//                 Cell: tableProps => (
//                     <>
//                             <p>{tableProps.row.original.name}</p>
//                     </>
//                 )
//             }, 
//             {
//                 Header: 'Email',
//                 accessor: 'email',
//                 Cell: tableProps => (
//                     <>
//                         <p style={{ "minWidth": 300 }}>{tableProps.row.original.email}</p>
//                     </>

//                 )

//             },
//             {
//                 Header: 'Status',
//                 accessor: 'status',
//                 Cell: tableProps => (
//                     <>
//                         <p>{tableProps.row.original.status}</p>
//                     </>

//                 )

//             },
//             {
//                 // Header: `Location `,
//                 Header: () => <p className="text-center">ACTION</p>,
//                 accessor: "action",
//                 Cell: (tableProps) => (
//                     <>
//                         <div className="border-l-2">
//                             <div
//                                 class="flex justify-center items-center"
//                                 style={{ minWidth: 200 }}
//                             >
//                                 <a
//                                     class="flex items-center text-danger"
//                                     href="javascript:;"
//                                     onClick={() => {
//                                         window.history.replaceState(
//                                             null,
//                                             null,
//                                             "?id=" +
//                                                 tableProps.row.original.id
//                                         );
//                                     }}
//                                     data-tw-toggle="modal"
//                                     data-target="#modal-confirmation-deactive"
//                                     data-id={tableProps.row.original.id}
//                                 >
//                                     <svg
//                                         xmlns="http://www.w3.org/2000/svg"
//                                         width="24"
//                                         height="24"
//                                         viewBox="0 0 24 24"
//                                         fill="none"
//                                         stroke="currentColor"
//                                         stroke-width="2"
//                                         stroke-linecap="round"
//                                         stroke-linejoin="round"
//                                         icon-name="trash-2"
//                                         data-lucide="trash-2"
//                                         class="lucide lucide-trash-2 w-4 h-4 mr-1"
//                                     >
//                                         <polyline points="3 6 5 6 21 6"></polyline>
//                                         <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
//                                         <line
//                                             x1="10"
//                                             y1="11"
//                                             x2="10"
//                                             y2="17"
//                                         ></line>
//                                         <line
//                                             x1="14"
//                                             y1="11"
//                                             x2="14"
//                                             y2="17"
//                                         ></line>
//                                     </svg>{" "}
//                                     Deactive
//                                 </a>
//                             </div>
//                         </div>
//                     </>
//                 ),
//             },

//         ],
//         []
//     )
  
//     const {
//         getTableProps,
//         getTableBodyProps,
//         headerGroups,
//         prepareRow,
//         page,
//         state,
//         canNextPage,
//         pageSize,
//         gotoPage,
//         canPreviousPage,
//         pageOptions,
//         nextPage,
//         allColumns,
//         previousPage,
//     } = useTable(
//         {
//             columns,
//             data        },
//         useSortBy,
//         usePagination
//     );
//     const { pageIndex } = state;
//     return (
//         <>
//             {/* btn btn--primary */}
//             <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
//                 <a
//                     href="javascript:;"
//                     data-tw-toggle="modal"
//                     data-tw-target="#superlarge-modal-size-preview"
//                     class="btn btn-rounded-primary  shadow-md mr-1 "
//                 >
//                     {" "}
//                     <svg
//                         xmlns="http://www.w3.org/2000/svg"
//                         class="icon icon-tabler icon-tabler-plus "
//                         width="24"
//                         height="24"
//                         viewBox="0 0 24 24"
//                         stroke-width="2"
//                         stroke="currentColor"
//                         fill="none"
//                         stroke-linecap="round"
//                         stroke-linejoin="round"
//                     >
//                         <path
//                             stroke="none"
//                             d="M0 0h24v24H0z"
//                             fill="none"
//                         ></path>
//                         <line x1="12" y1="5" x2="12" y2="19"></line>
//                         <line x1="5" y1="12" x2="19" y2="12"></line>
//                     </svg>
//                     <span>&nbsp;Create User&nbsp;</span>
//                 </a>

//                 <div class="hidden md:block mx-auto text-slate-500">
//                     {/* Showing 1 to 10 of 150 entries */}
//                 </div>
//                 <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
//                     <TableSearch
//                         className="flex-none"
//                         columns={columns}
//                         SearchFilter={SearchFilter}
//                         resetSearchFilter={resetSearchFilter}
//                     />
//                     <div className="ml-2">
//                         <TabelHiddenColumn
//                             allColumns={allColumns}
//                             className="flex-none"
//                         />
//                     </div>
//                 </div>
//             </div>

//             <Table
//                 getTableProps={getTableProps}
//                 prepareRow={prepareRow}
//                 getTableBodyProps={getTableBodyProps}
//                 headerGroups={headerGroups}
//                 page={page}
//             />
//         </>
//     );
// }

// export default MasterUser;

// if (document.getElementById("master-user")) {
//     ReactDOM.render(<MasterUser />, document.getElementById("master-user"));
// }
