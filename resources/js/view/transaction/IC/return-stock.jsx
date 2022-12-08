import moment from "moment";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { useTable, usePagination, useSortBy } from "react-table";
import ReactTooltip from "react-tooltip";
import TabelFooter from "../../../components/tabel_footer";
import Table from "../../../components/table";
import TabelHiddenColumn from "../../../components/table_hidden_column";
import TableLoading from "../../../components/table_loding";
import TableSearch from "../../../components/table_search";
import Api from "../../../utils/api";
import Filter from "../../../utils/filter";

function ReturnStock() {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);
    const [requestForms, setRequestForms] = useState([]);
    const [isUsed, setIsUsed] = useState(null);

    useEffect(() => {
        async function getData() {
            api.getReturnStockGRF().then((response) => {
                setRawData(response.data.data);
                setData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    }, []);

    function handleClickRequestForms(grfId) {
        api.getReturnStockGRF().then((response) => {
            let aa = response.data.data.filter(x => x.id == grfId)[0];
            console.log(aa);
            setRequestForms(aa);
            setIsUsed(aa.request_forms.length > 0 ? true : false);
        });
    }

    function filterNoStock() {
        let result = filter.noStock(noStock, rawData);
        setData(result);
        setNoStock(!noStock);
    }

    function SearchFilter(search, column) {
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
                Header: "Grf",
                accessor: "grf_code",
                Cell: (tableProps) => (
                    <>
                        <a className="text-primary text-decoration-none">
                            &nbsp;{tableProps.row.original.grf_code}
                        </a>
                    </>
                ),
            },
            {
                //Add this line to the column definition
                Header: "Requester",
                accessor: "user_id",
                // style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: (tableProps) => (
                    <>
                        <a
                            className="text-primary text-decoration-none "
                        >
                            {" "}
                            &nbsp;{tableProps.row.original.user.name}
                        </a>
                    </>
                ),
            },
            {
                //Add this line to the column definition
                Header: "Status",
                accessor: "status",
                // style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: (tableProps) => {
                    switch (tableProps.row.original.status) {
                        case "return":
                            return (
                                <>
                                    <div className="flex  whitespace-nowrap text-slate-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-packge-export w-4 h-4 mr-2" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
                                            <path d="M12 12l8 -4.5"></path>
                                            <path d="M12 12v9"></path>
                                            <path d="M12 12l-8 -4.5"></path>
                                            <path d="M15 18h7"></path>
                                            <path d="M19 15l3 3l-3 3"></path>
                                        </svg>
                                        {" "}
                                        Requester return
                                    </div>
                                </>
                            );
                        case "return_ic_approved":
                            return (
                                <>
                                    <div className="flex  whitespace-nowrap text-success">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            className="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        Approved By IC
                                    </div>
                                </>
                            );
                        default:
                            return (
                                <>
                                    <div className="flex  whitespace-nowrap text-danger">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            className="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        Reject
                                    </div>
                                </>
                            );
                    }
                },
            },
            {
                //Add this line to the column definition
                Header: "Request At",
                accessor: "created_at",
                // style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: (tableProps) => (
                    <>
                        <a
                            href="#"
                            className="text-primary text-decoration-none "
                        >
                            {" "}
                            &nbsp;
                            {moment(tableProps.row.original.created_at).format(
                                "DD-MM-Y HH:mm"
                            )}
                        </a>
                    </>
                ),
            },

            {
                // Header: `Location `,
                Header: () => <p className="text-center">ACTION</p>,
                accessor: "action",
                Cell: (tableProps) => (
                    <>
                        <div className="border-l-2">
                            <div className="flex justify-center items-center" style={{ minWidth: 200 }}>
                                <button className={ tableProps.row.original.status == "submited" ? " button-check-approv flex items-center text-success mr-3 " : " button-check-approv flex items-center text-success disabled " } data-tw-toggle="modal" data-tw-target="#modal-check-approve" onClick={ () => handleClickRequestForms(tableProps.row.original.id) }>
                                    <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-zoom-check w4 h-4 ml-1" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="10" cy="10" r="7"></circle>
                                        <path d="M21 21l-6 -6"></path>
                                        <path d="M7 10l2 2l4 -4"></path>
                                    </svg>{" "}
                                    Check & Approve
                                </button>
                            </div>
                        </div>
                    </>
                ),
            },
        ],
        []
    );

    const {
        getTableProps,
        getTableBodyProps,
        headerGroups,
        prepareRow,
        page,
        state,
        canNextPage,
        setPageSize,
        gotoPage,
        canPreviousPage,
        pageOptions,
        nextPage,
        allColumns,
        previousPage,
    } = useTable(
        {
            columns,
            data,
        },
        useSortBy,
        usePagination
    );
    const { pageIndex } = state;
    return (
        <>
            <div id="modal-check-approve" className="modal" tabIndex="-1" aria-hidden="true">
                <div className="modal-dialog modal-lg">
                    <div className="modal-content">
                        <div className="modal-body p-0">
                            <div className="p-5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-info-circle text-slate-600 mx-auto mt-3" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                <div className="text-md my-5">{ requestForms.grf_code }</div>
                                {
                                    isUsed ?
                                    <table role="table" className="table table-report -mt-2 overflow-scroll w-full">
                                        <thead>
                                            <tr>
                                                <th>Return Item</th>
                                                <th class="text-right">Return Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody role="rowgroup">
                                            {
                                                requestForms.request_forms?.map((i) => 
                                                    <tr role="row" className="intro-y">
                                                        <td role="cell" className="align-middle text-left"><span className="text-primary text-decoration-none"> &nbsp; { i.part.name }  </span></td>
                                                        {
                                                            i.part.sn_status == 'SN' || i.part.sn_status == 'sn' ?
                                                            <td role="cell" className="align-middle text-right"><span className="text-primary text-decoration-none "> &nbsp;  { i.request_stocks.length }  item </span></td>
                                                            :
                                                            <td role="cell" className="align-middle text-right"><span className="text-primary text-decoration-none "> &nbsp;  { i.quantity }  item </span></td>
                                                        }
                                                    </tr>
                                                )
                                            }
                                        </tbody>
                                    </table>
                                    :
                                    <div className="text-center py-8">
                                        Semua barang terpakai
                                    </div>
                                }
                            </div>
                            <form action={ "/transaction/" + requestForms.id } method="POST" className="px-5 pb-8 text-center">
                                <a data-tw-dismiss="modal" className="btn btn-outline-secondary w-24 mr-2">Cancel</a>
                                <button className="btn text-white !bg-emerald-700 impor" type="submit" name="isUsed" value={ isUsed ? `true` : `false` }>{ isUsed ? `Approve` : `Approve dan akhiri GRF` }</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div className="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <div className="hidden md:block mx-auto text-slate-500"></div>
                <div className="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
                    <TableSearch
                        className="flex-none"
                        columns={columns}
                        SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter}
                    />
                    <div className="ml-2">
                        <TabelHiddenColumn
                            allColumns={allColumns}
                            className="flex-none"
                        />
                    </div>
                </div>
            </div>
            <div className="mt-8">
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
            </div>

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

export default ReturnStock;

if (document.getElementById("return-stock")) {
    ReactDOM.render(
        <ReturnStock />,
        document.getElementById("return-stock")
    );
}
