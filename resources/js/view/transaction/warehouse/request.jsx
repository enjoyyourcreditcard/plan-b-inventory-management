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

function Request(props) {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getWarehouseRequest(props.wh_id).then((response) => {
                setRawData(response.data.data);
                setData(response.data.data);

                setLoadingData(false);
            });
        }
        if (loadingData) {
            // console.log(props.auth)
            getData();
        }
    }, []);

    function filterNoStock() {
        let result = filter.noStock(noStock, rawData);
        setData(result);
        setNoStock(!noStock);
    }

    function SearchFilter(search, column) {
        // console.log(column);
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
                // style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: (tableProps) => (
                    <>
                        <a
                            href={
                                "/warehouse/show/" +
                                tableProps.row.original.grf_code.replaceAll(
                                    "/",
                                    "~"
                                )
                            }
                            className="text-primary text-decoration-none "
                        >
                            &nbsp;{tableProps.row.original.grf_code}
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
                        case "submited":
                            return (
                                <>
                                    <div class="flex items-center justify-center whitespace-nowrap text-pending">
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
                                    <div class="flex items-center justify-center whitespace-nowrap text-success">
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
                                    <div class="flex items-center justify-center whitespace-nowrap text-success">
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
                                    <div class="flex items-center justify-center whitespace-nowrap text-success">
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
                        case "closed":
                            return (
                                <>
                                    <div class="flex items-center justify-center whitespace-nowrap text-success">
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
                            return "foo";
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
                                "DD-MM-Y"
                            )}
                        </a>
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
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <div class="hidden md:block mx-auto text-slate-500"></div>
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

export default Request;



if (document.getElementById("warehouse-transaction-request")) {
    const propsContainer = document.getElementById("warehouse-transaction-request");
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(
        <Request {...props} />,
        document.getElementById("warehouse-transaction-request")
    );
}