import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { useTable, usePagination, useSortBy } from "react-table";
import ReactTooltip from "react-tooltip";
import TabelFooter from "../../components/tabel_footer";
import Table from "../../components/table.jsx";
import TabelHiddenColumn from "../../components/table_hidden_column";
import TableLoading from "../../components/table_loding";
import TableSearch from "../../components/table_search";
import Api from "../../utils/api";
import Filter from "../../utils/filter";

function MasterUser() {
    const api = new Api;
    const filter = new Filter;
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);
    const [userid, setId] = useState([]);
    const [username, setName] = useState([]);
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    useEffect(() => {
        async function getData() {
            api.getUser().then((response) => {
                setRawData(response.data.data)
                setData(response.data.data);
                setLoadingData(false);
            })
        }
        if (loadingData) {
            getData();
        }
    }, []);

    function filterNoStock() {
        let result = filter.noStock(noStock, rawData);
        setData(result);
        setNoStock(!noStock);
    }

    function SearchFilter(search, column) {
        console.log(column);
        let result = filter.search(search, column, rawData);
        setData(result);
    }

    function resetSearchFilter() {
        setData(rawData);
    }

    const columns = React.useMemo(

        () => [

            {
                //Add this line to the column definition
                Header: 'Name',
                accessor: 'name',
                style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: tableProps => (
                    <>
                            <p>{tableProps.row.original.name}</p>
                    </>
                )
            }, 
            {
                Header: 'Role',
                accessor: 'role',
                Cell: tableProps => (
                    <>
                        <p className="capitalize">{tableProps.row.original.role}</p>
                    </>

                )
            },
            {
                Header: 'Regional',
                accessor: 'regional',
                Cell: tableProps => (
                    <>
                        <p className="capitalize">{tableProps.row.original.regional}</p>
                    </>

                )
            },
            {
                Header: 'Warehouse',
                accessor: 'warehouse',
                Cell: tableProps => (
                    <>
                        <p className="capitalize" style={{ minWidth: 150 }}>{tableProps.row.original.warehouse.name}</p>
                    </>

                )
            },
            {
                Header: 'NIK',
                accessor: 'nik',
                Cell: tableProps => (
                    <>
                        <p>{tableProps.row.original.nik}</p>
                    </>

                )
            },
            {
                Header: 'No.Telepon',
                accessor: 'no_telp',
                Cell: tableProps => (
                    <>
                        <p>{tableProps.row.original.no_telp}</p>
                    </>

                )
            },
            {
                Header: 'Email',
                accessor: 'email',
                Cell: tableProps => (
                    <>
                        <p>{tableProps.row.original.email}</p>
                    </>

                )
            },
            {
                Header: 'Status',
                accessor: 'status',
                Cell: tableProps => (
                    <>
                        <p className="capitalize">{tableProps.row.original.status}</p>
                    </>

                )
            },
            {
                // Header: `Location `,
                Header: () => <p className="text-center">ACTION</p>,
                accessor: "action",
                Cell: (tableProps) => (
                    <>
                        <div className="border-l-2">
                            <div class="flex justify-center items-center" style={{ minWidth: 200 }}>
                                <a 
                                class="flex items-center mr-3 edit-user-modal" 
                                    data-tw-toggle="modal" data-tw-target="#edit-user-modal"
                                    data-id={tableProps.row.original.id}
                                    data-name={tableProps.row.original.name}
                                    data-email={tableProps.row.original.email}
                                    data-password={tableProps.row.original.password}
                                    data-role={tableProps.row.original.role}
                                    data-regional={tableProps.row.original.regional}
                                    data-warehouseid={tableProps.row.original.warehouse_id}
                                    data-warehouse={tableProps.row.original.warehouse.name}
                                    data-nik={tableProps.row.original.nik}
                                    data-notelp={tableProps.row.original.no_telp}
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                        class="lucide lucide-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg>
                                    Edit
                                </a>
                                { 
                                    tableProps.row.original.status == "active" ? 
                                    <a class="flex items-center text-danger" href="javascript:;" 
                                    onClick={()=>
                                        {
                                            window.history.replaceState(null, null,); 
                                            setId( tableProps.row.original.id );
                                            setName(tableProps.row.original.name);
                                        }}
                                        data-tw-toggle="modal" data-tw-target="#modal-confirmation-deactive"
                                        data-id={tableProps.row.original.id}
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x w-4 h-4 mr-1" viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        Deactive
                                    </a>
                                    :
                                    <a class="flex items-center text-primary" href="javascript:;" onClick={()=>
                                        {window.history.replaceState(null, null,); setId( tableProps.row.original.id ); setName( tableProps.row.original.name
                                        );}} data-tw-toggle="modal"
                                        data-tw-target="#modal-confirmation-active"
                                        data-id={tableProps.row.original.id}>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-lg w-4 h-4 mr-1" viewBox="0 0 16 16">
                                            <path
                                                d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                        </svg>
                                        Active
                                    </a>
                                }
                            </div>
                        </div>
                    </>
                ),
            },

        ],
        []
    )
  
    const {
        getTableProps,
        getTableBodyProps,
        headerGroups,
        prepareRow,
        page,
        setPageSize,
        state,
        canNextPage,
        pageSize,
        gotoPage,
        canPreviousPage,
        pageOptions,
        nextPage,
        allColumns,
        previousPage,
    } = useTable(
        {
            columns,
            data        },
        useSortBy,
        usePagination
    );
    const { pageIndex } = state;
    return (
        <>
            <div id="modal-confirmation-deactive" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base">Deactive</h2>
                        </div>
                        <div class="modal-body text-center">
                            <h2 class="text-base mr-auto">Confirm user "{username}" deactivation?</h2>
                        </div>
                        <form action="/user/status" method="POST">
                            <input type="hidden" name="_token" value={csrfToken}/>
                            <input type="hidden" name="id" value={userid} />
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                <button type="submit" class="btn btn-danger w-20">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal-confirmation-active" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base">Active</h2>
                        </div>
                        <div class="modal-body text-center">
                            <h2 class="text-base mr-auto">Confirm user "{username}" activation?</h2>
                        </div>
                        <form action="/user/status" method="POST">
                            <input type="hidden" name="_token" value={csrfToken}/>
                            <input type="hidden" name="id" value={userid} />
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                <button type="submit" class="btn btn-primary w-20">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {/* btn btn--primary */}
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#create-user-modal"
                    class="btn btn-rounded-primary  shadow-md mr-1 ">
                    {" "}
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus " width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>&nbsp;Create User&nbsp;</span>
                </a>

                <div class="hidden md:block mx-auto text-slate-500">
                    {/* Showing 1 to 10 of 150 entries */}
                </div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
                    <TableSearch className="flex-none" columns={columns} SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter} />
                    <div className="ml-2">
                        <TabelHiddenColumn allColumns={allColumns} className="flex-none" />
                    </div>
                </div>
            </div>
            <TabelFooter
                    gotoPage={gotoPage}
                    previousPage={previousPage}
                    nextPage={nextPage}
                    pageIndex={pageIndex}
                    canPreviousPage={canPreviousPage}
                    canNextPage={canNextPage}
                    setPageSize={setPageSize}
                    pageOptions={pageOptions}
                />
            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page}
            />
        </>
    );
}

export default MasterUser;

if (document.getElementById("master-user")) {
    ReactDOM.render(<MasterUser />, document.getElementById("master-user"));
}
