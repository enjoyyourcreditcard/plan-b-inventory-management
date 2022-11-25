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

function Outbound() {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getOutboundGRF().then((response) => {
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
                //Add this line to the column definition
                Header: "Grf",
                accessor: "grf_code",
                Cell: (tableProps) => (
                    <>
                        {tableProps.row.original.status == "submited" ? (
                            <a
                                href={
                                    "/transaction/detail/grf/" +
                                    tableProps.row.original.grf_code.replaceAll(
                                        "/",
                                        "~"
                                    )
                                }
                                className="text-primary text-decoration-none "
                            >
                                &nbsp;{tableProps.row.original.grf_code}
                            </a>
                        ) : (
                            <p className="text-primary text-decoration-none ">
                                &nbsp;{tableProps.row.original.grf_code}
                            </p>
                        )}
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
                        case "submited":
                            return (
                                <>
                                    <div class="flex  whitespace-nowrap text-pending">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        Submited
                                    </div>
                                </>
                            );
                        case "ic_approved":
                            return (
                                <>
                                    <div class="flex  whitespace-nowrap text-success">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        Approved By IC
                                    </div>
                                </>
                            );
                        case "delivery_approved":
                            return (
                                <>
                                    <div class="flex  whitespace-nowrap text-success">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        Approved By Warehouse
                                    </div>
                                </>
                            );
                        case "user_pickup":
                            return (
                                <>
                                    <div class="flex  whitespace-nowrap text-success">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        User Pickup
                                    </div>
                                </>
                            );
                            case "return":
                            return (
                                <>
                                    <div class="flex  whitespace-nowrap text-success">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        Pengembalian
                                    </div>
                                </>
                            );
                        case "closed":
                            return (
                                <>
                                    <div class="flex  whitespace-nowrap text-success">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-2"
                                        >
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg>{" "}
                                        Closed
                                    </div>
                                </>
                            );
                        default:
                            return (
                                <>
                                    <div class="flex  whitespace-nowrap text-danger">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            icon-name="check-square"
                                            data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-2"
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
                Header: "PIC",
                accessor: "user_id",
                // style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: (tableProps) => (
                    <>
                        <a
                            href="#"
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
                Header: "Warehouse",
                accessor: "warehouse_id",
                // style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: (tableProps) => (
                    <>
                        <a
                            href="#"
                            className="text-primary text-decoration-none "
                        >
                            {" "}
                            &nbsp;{tableProps.row.original.warehouse.name}
                        </a>
                    </>
                ),
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
                            <div
                                class="flex justify-center items-center"
                                style={{ minWidth: 200 }}
                            >
                                <a
                                    // class="flex items-center mr-3 text-success"
                                    class={
                                        tableProps.row.original.status ==
                                        "submited"
                                            ? " flex items-center text-success mr-3 "
                                            : "flex items-center text-success mr-3 disabled"
                                    }
                                    href={
                                        "/transaction/detail/grf/" +
                                        tableProps.row.original.grf_code.replaceAll(
                                            "/",
                                            "~"
                                        )
                                    }
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        icon-name="check-square"
                                        data-lucide="check-square"
                                        class="lucide lucide-check-square w-4 h-4 mr-1"
                                    >
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg>{" "}
                                    Approve
                                </a>
                                <a
                                    // class="flex items-center mr-3 text-danger"
                                    class={
                                        tableProps.row.original.status !=
                                        "submited"
                                            ? " flex items-center text-danger mr-3 disabled"
                                            : "flex items-center text-danger mr-3"
                                    }
                                    href="javascript:;"
                                    onClick={() => {
                                        window.history.replaceState(
                                            null,
                                            null,
                                            "?grf_id=" +
                                                tableProps.row.original.id
                                        );
                                    }}
                                    data-tw-toggle="modal"
                                    data-tw-target="#grf-reject-confirmation-modal"
                                    data-id="2"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        icon-name="trash-2"
                                        data-lucide="trash-2"
                                        class="lucide lucide-trash-2 w-4 h-4 mr-1"
                                    >
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                        <line
                                            x1="10"
                                            y1="11"
                                            x2="10"
                                            y2="17"
                                        ></line>
                                        <line
                                            x1="14"
                                            y1="11"
                                            x2="14"
                                            y2="17"
                                        ></line>
                                    </svg>{" "}
                                    Reject
                                </a>
                                <a
                                    class={"flex items-center text-pending "}
                                    href={
                                        "/grf/" +
                                        tableProps.row.original.grf_code.replaceAll(
                                            "/",
                                            "~"
                                        )
                                    }
                                    target="_blank"
                                    data-tw-toggle="modal"
                                    data-tw-target="#part-delete-confirmation-modal"
                                    data-id="2"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-eye"
                                        viewBox="0 0 16 16"
                                    >
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                    <span className="ml-1">View</span>
                                </a>
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
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                {/* <a
                    href="javascript:;"
                    data-tw-toggle="modal"
                    data-tw-target="#superlarge-modal-size-preview"
                    class="btn btn-rounded-primary  shadow-md mr-1 "
                >
                    {" "}
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-plus "
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        stroke-width="2"
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

                <div class="hidden md:block mx-auto text-slate-500">
                    {/* Showing 1 to 10 of 150 entries */}
                </div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
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

export default Outbound;

if (document.getElementById("transaction-outbound")) {
    ReactDOM.render(
        <Outbound />,
        document.getElementById("transaction-outbound")
    );
}
