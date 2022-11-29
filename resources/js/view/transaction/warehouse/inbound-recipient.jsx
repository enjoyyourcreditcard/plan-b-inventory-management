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

function InboundGiver(props) {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getInboundRecipientIndex(props.warehouse_destination).then((response) => {
                setRawData(response.data.data);
                setData(response.data.data);
                setLoadingData(false);
            });
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
                Header: "GRF CODE",
                accessor: "grf_code",
                Cell: (tableProps) => {
                    switch (tableProps.row.original.grf_code) {
                        case null:
                            return (
                                <>
                                    <span className="text-primary text-decoration-none ">
                                        &nbsp;-
                                    </span>
                                </>
                            );
                    
                        default:
                            return (
                            <>
                                <span className="text-primary text-decoration-none ">
                                    &nbsp;{tableProps.row.original.grf_code}
                                </span>
                            </>
                            );
                    }
                },
            },
            {
                Header: "Name",
                accessor: "id",
                Cell: (tableProps) => (
                    <>
                        <span className="text-primary text-decoration-none ">
                            &nbsp;Request { tableProps.row.original.id }
                        </span>
                    </>
                ),
            },
            {
                Header: "Status",
                accessor: "status",
                Cell: (tableProps) => {
                    switch (tableProps.row.original.status) {
                        // case 'delivery_approved':
                        //     return (
                        //         <>
                        //             <div className="flex items-center whitespace-nowrap text-success">
                        //                 <svg
                        //                     xmlns="http://www.w3.org/2000/svg"
                        //                     width="24"
                        //                     height="24"
                        //                     viewBox="0 0 24 24"
                        //                     fill="none"
                        //                     stroke="currentColor"
                        //                     strokeWidth="2"
                        //                     strokeLinecap="round"
                        //                     strokeLinejoin="round"
                        //                     icon-name="check-square"
                        //                     data-lucide="check-square"
                        //                     className="lucide lucide-check-square w-4 h-4 mr-2"
                        //                 >
                        //                     <polyline points="9 11 12 14 22 4"></polyline>
                        //                     <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                        //                 </svg>{" "}
                        //                 <span>Ready to deliver</span>
                        //             </div>
                        //         </>  
                        //     );                    
                        case 'delivery_approved':
                            return (
                                <>
                                    <div className="flex items-cetner whitespace-nowrap text-amber-600">
                                        <span>Waiting for pickup..</span>
                                    </div>
                                </>    
                            );
                    }
                    
                },
            },
            {
                Header: "Delivery from",
                accessor: "warehouse_id",
                Cell: (tableProps) => (
                    <>
                        <span>
                            &nbsp;{tableProps.row.original.warehouse.name}
                        </span>
                    </>
                ),
            },
            {
                Header: "Action",
                Cell: (tableProps) => (
                    <>
                        <a className="text-emerald-600 flex items-center underline gap-1 decoration-dotted" href={ `/inbound/recipient/` + tableProps.row.original.id }>
                            <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="2"></circle>
                                <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                            </svg>
                            <span>Details</span>
                        </a>
                    </>
                ),
            },
           
            // {
            //     //Add this line to the column definition
            //     Header: "Request At",
            //     accessor: "created_at",
            //     // style: { 'maxWidth': 10 },//Add this line to the column definition
            //     Cell: (tableProps) => (
            //         <>
            //             <a
            //                 href="#"
            //                 className="text-primary text-decoration-none "
            //             >
            //                 {" "}
            //                 &nbsp;{moment(tableProps.row.original.created_at).format('DD-MM-Y')}
            //             </a>
            //         </>
            //     ),
            // },

            // {
            //     // Header: `Location `,
            //     Header: () => <p className="text-center">ACTION</p>,
            //     accessor: "action",
            //     Cell: (tableProps) => (
            //         <>
            //             {/* <div className="border-l-2">
            //                 <div
            //                     className="flex justify-center items-center"
            //                     style={{ minWidth: 200 }}
            //                 >
            //                     <a
            //                         className="flex items-center mr-3"
            //                         href="javascript:;"
            //                     >
            //                         <svg
            //                             xmlns="http://www.w3.org/2000/svg"
            //                             width="24"
            //                             height="24"
            //                             viewBox="0 0 24 24"
            //                             fill="none"
            //                             stroke="currentColor"
            //                             strokeWidth="2"
            //                             stroke-linecap="round"
            //                             stroke-linejoin="round"
            //                             icon-name="check-square"
            //                             data-lucide="check-square"
            //                             className="lucide lucide-check-square w-4 h-4 mr-1"
            //                         >
            //                             <polyline points="9 11 12 14 22 4"></polyline>
            //                             <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
            //                         </svg>{" "}
            //                         Edit
            //                     </a>
            //                     <a
            //                         className="flex items-center text-danger"
            //                         href="javascript:;"
            //                         onClick={() => {
            //                             window.history.replaceState(
            //                                 null,
            //                                 null,
            //                                 "?part_id=" +
            //                                     tableProps.row.original.id
            //                             );
            //                         }}
            //                         data-tw-toggle="modal"
            //                         data-tw-target="#part-delete-confirmation-modal"
            //                         data-id="2"
            //                     >
            //                         <svg
            //                             xmlns="http://www.w3.org/2000/svg"
            //                             width="24"
            //                             height="24"
            //                             viewBox="0 0 24 24"
            //                             fill="none"
            //                             stroke="currentColor"
            //                             strokeWidth="2"
            //                             stroke-linecap="round"
            //                             stroke-linejoin="round"
            //                             icon-name="trash-2"
            //                             data-lucide="trash-2"
            //                             className="lucide lucide-trash-2 w-4 h-4 mr-1"
            //                         >
            //                             <polyline points="3 6 5 6 21 6"></polyline>
            //                             <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
            //                             <line
            //                                 x1="10"
            //                                 y1="11"
            //                                 x2="10"
            //                                 y2="17"
            //                             ></line>
            //                             <line
            //                                 x1="14"
            //                                 y1="11"
            //                                 x2="14"
            //                                 y2="17"
            //                             ></line>
            //                         </svg>{" "}
            //                         Delete
            //                     </a>
            //                 </div>
            //             </div> */}
            //         </>
            //     ),
            // },
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
            data,
        },
        useSortBy,
        usePagination
    );
    const { pageIndex } = state;
    return (
        <>
            {/* btn btn--primary */}
            <div className="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                {/* <a
                    href="javascript:;"
                    data-tw-toggle="modal"
                    data-tw-target="#superlarge-modal-size-preview"
                    className="btn btn-rounded-primary  shadow-md mr-1 "
                >
                    {" "}
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="icon icon-tabler icon-tabler-plus "
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        strokeWidth="2"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path
                            stroke="none"
                            d="M0 0h24v24H0z"
                            fill="none"
                        ></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>&nbsp;Export Excel&nbsp;</span>
                </a> */}

                <div className="hidden md:block mx-auto text-slate-500">
                    {/* Showing 1 to 10 of 150 entries */}
                </div>
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

            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page}
            />
            {/* <div className="flex flex-col h-screen">
                <div className="flex-grow overflow-auto">
                    <table className="relative w-full border">
                        <thead>
                            <tr>
                                <th className="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                                <th className="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                                <th className="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                            </tr>
                        </thead>
                        <tbody className="divide-y bg-red-100">
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                        </tbody>
                       
                    </table>
                </div>
            </div> */}
        </>

        // <div>
        //     <div className="pt-3 ">
        //         <div className="d-flex">
        //             <div>
        //                 {/* TODO: data-bs-target dibikin props */}
        //                 <button data-bs-toggle="modal" data-bs-target="#createPartModal" className="btn btn-primary w-100">
        //                     <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        //                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        //                         <line x1="12" y1="5" x2="12" y2="19"></line>
        //                         <line x1="5" y1="12" x2="19" y2="12"></line>
        //                     </svg>
        //                     New Part
        //                 </button>
        //             </div>

        // <TableSearch
        //     columns={columns}
        //     SearchFilter={SearchFilter}
        //     resetSearchFilter={resetSearchFilter} />

        //             <div className='px-1'></div>
        //             {/* <div className="btn-group h-25 ">
        //                 <button type="button" className=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        //                     <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        //                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        //                         <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
        //                     </svg>
        //                 </button>
        //                 <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
        //                     <button className="dropdown-item" href="#"><input type="checkbox" checked={noStock} onChange={filterNoStock} />&nbsp; No Stock</button>
        //                 </div>
        //             </div> */}
        //             <div className='px-1'></div>

        // <TabelHiddenColumn
        //     allColumns={allColumns} />
        //         </div>
        //     </div>
        //     {loadingData ? (
        //         <TableLoading />
        //     ) : (
        //         <Table
        //             getTableProps={getTableProps}
        //             prepareRow={prepareRow}
        //             getTableBodyProps={getTableBodyProps}
        //             headerGroups={headerGroups}
        //             page={page} />
        //     )}

        //     <TabelFooter
        //         gotoPage={gotoPage}
        //         pageIndex={pageIndex}
        //         pageOptions={pageOptions}
        //         canPreviousPage={canPreviousPage}
        //         previousPage={previousPage}
        //         canNextPage={canNextPage}
        //         nextPage={nextPage} />
        // </div>
    );
}

export default InboundGiver;

if (document.getElementById("inboundRecipient")) {
    const propsContainer = document.getElementById("inboundRecipient");
    const props = Object.assign({}, propsContainer.dataset);

    ReactDOM.render(
        <InboundGiver {...props} />,
        document.getElementById("inboundRecipient")
    );
}