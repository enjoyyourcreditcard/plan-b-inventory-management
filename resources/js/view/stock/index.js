import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useGlobalFilter, useSortBy, useFilters } from 'react-table'
import TabelFooter from '../../components/tabel_footer';
import Table from '../../components/Table';
import TabelHiddenColumn from '../../components/table_hidden_column';
import TableSearch from '../../components/table_search';
import Api from '../../utils/api';
import moment from 'moment';
import ReactTooltip from 'react-tooltip';
import TableLoading from '../../components/table_loding';
import Filter from '../../utils/filter';

function Stock() {
    const api = new Api;
    const filter = new Filter;
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getStock().then((response) => {
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
        let data = noStock ? rawData : rawData.filter((i) => i.stocks_count === 0)
        setData(data);
        setNoStock(!noStock);
    }

    function SearchFilter(search, column) {
        let result = filter.search(search,column,rawData);
        setData(result);
    }

    function resetSearchFilter() {
            setData(rawData);
    }


    const columns = React.useMemo(

        () => [{

            //Add this line to the column definition
            Header: 'Serial Number',
            accessor: 'sn_code',
            style: { 'maxWidth': 1 },//Add this line to the column definition
            Cell: tableProps => (
                <>
                    <a href={"/stock/" + tableProps.row.original.id} className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.sn_code ? tableProps.row.original.sn_code : " - "}</a>
                </>
            )
        },

        {

            Header: 'Name',
            accessor: 'part_name',
            // style: {  },
            
            Cell: tableProps => (
                <div style={{ "minWidth": 300 }}>
                    <ReactTooltip place="right" effect="solid" backgroundColor="rgba(255, 355, 255,0)" getContent={(img) =>
                        <img src={"/" + tableProps.row.original.part.img} />} />

                    <div id="thumbwrap" >
                        <a data-tip={tableProps.row.original.part.name}>
                            <img src={"/" + tableProps.row.original.part.img} alt="" width={30} height={25} style={{ border: "1px solid #CCCCEE" }} />
                        </a>
                        <a href={"/part/" + tableProps.row.original.part.id} className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.part_name}</a>
                    </div>
                </div>
            )
        }, {
            Header: 'Warehouse',
            accessor: 'wh_name',

            Cell: tableProps => (
                <>
                    <p style={{ "minWidth": 300 }}>{tableProps.row.original.wh_name}</p>
                </>

            )

        },
      
        {
            Header: 'Category',
            accessor: 'category_name',

            Cell: tableProps => (
                <>
                    <p >{tableProps.row.original.category_name}</p>
                </>

            )

        },
        {
            Header: 'UOM',
            accessor: 'uom',

            Cell: tableProps => (
                <>
                    <p>{tableProps.row.original.part.uom}</p>
                </>

            )

        },
        {
            Header: 'SN Status',
            accessor: 'sn_status',

            Cell: tableProps => (
                <>
                    <p style={{ "minWidth": 300 }}>{tableProps.row.original.part.sn_status}</p>
                </>

            )

        },
        {
            Header: 'Color',
            accessor: 'color',

            Cell: tableProps => (
                <>
                    <p style={{ "minWidth": 300 }}>{tableProps.row.original.part.color}</p>
                </>

            )

        },
        {
            Header: 'Brand',
            accessor: 'brand_name',

            Cell: tableProps => (
                <>
                    <p style={{ "minWidth": 300 }}>{tableProps.row.original.brand_name}</p>
                </>

            )

        },
        {
            Header: 'Condition',
            accessor: 'condition',

            Cell: tableProps => (
                <>
                    <p style={{ "minWidth": 300 }}>{tableProps.row.original.condition}</p>
                </>

            )

        },
        
        {
            Header: 'Created At',
            accessor: 'created_at',

            Cell: tableProps => (
                <>
                    <p >{moment(tableProps.row.original.created_at).format('DD-MM-YYYY')}</p>
                </>

            )

        },

        ],
        []
    )

    const initialState = {
        hiddenColumns: [
            "uom",
            "sn_status",
            "color",
            "brand_name",
            "category"]
    };

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
        setGlobalFilter
    } = useTable(
        {
            columns,
            data,
            initialState
        },
        useGlobalFilter, useSortBy, usePagination
    )
    const { globalFilter, pageIndex } = state
    return (
        <div>
            <div className="pt-3 ">
                <div className="d-flex">
                    <div>
                        {/* <button data-bs-toggle="modal" data-bs-target="#selectStockModal"
                            class="btn btn-primary w-100"></button> */}

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectStockModal">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            New Stock
                        </button>

                    </div>
 <TableSearch
                        columns={columns}
                        SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter}/>

                    <div className='px-1'></div>
                    <div class="btn-group h-25 ">
                        <button type="button" class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
                            </svg>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" href="#"><input type="checkbox" checked={noStock} onChange={filterNoStock} />&nbsp; No Stock</button>
                        </div>
                    </div>
                    <div className='px-1'></div>

                    <TabelHiddenColumn
                        allColumns={allColumns} />
                </div>
            </div>
            {loadingData ? (
                <TableLoading />
            ) : (
                <Table
                    getTableProps={getTableProps}
                    prepareRow={prepareRow}
                    getTableBodyProps={getTableBodyProps}
                    headerGroups={headerGroups}
                    page={page} />
            )}


            <TabelFooter
                gotoPage={gotoPage}
                pageIndex={pageIndex}
                pageOptions={pageOptions}
                canPreviousPage={canPreviousPage}
                previousPage={previousPage}
                canNextPage={canNextPage}
                nextPage={nextPage} />
        </div>
    );
}

export default Stock;

if (document.getElementById('stock')) {
    ReactDOM.render(<Stock />, document.getElementById('stock'));
}
