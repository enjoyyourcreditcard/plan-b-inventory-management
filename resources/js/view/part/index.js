import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useGlobalFilter, useSortBy, useFilters } from 'react-table'
import ReactTooltip from 'react-tooltip';
import TabelFooter from '../../components/tabel_footer';
import Table from '../../components/Table';
import TabelHiddenColumn from '../../components/table_hidden_column';
import TableLoading from '../../components/table_loding';
import TableSearch from '../../components/table_search';
import Api from '../../utils/api';

function Parts() {
    const api = new Api;
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getPart().then((response) => {
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
    const columns = React.useMemo(

        () => [

            {

                //Add this line to the column definition
                Header: 'Name',
                accessor: 'name',
                style: { 'maxWidth': 10 },//Add this line to the column definition

                Cell: tableProps => (
                    <>
                        <ReactTooltip place="right"  effect="solid"   backgroundColor="rgba(255, 355, 255,0)" getContent={(img) =>
                        <img src={"/" + tableProps.row.original.img} />} />

                    <div id="thumbwrap" >
                        <a data-tip={tableProps.row.original.name}>
                            <img src={"/" + tableProps.row.original.img} alt="" width={30} height={25} style={{ border: "1px solid #CCCCEE" }} />
                        </a>
                        <a href={"/part/" + tableProps.row.original.id} className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.name}</a>
                    </div>
                    </>
                )
            }, {
                Header: 'Description',
                accessor: 'description',

                Cell: tableProps => (
                    <>
                        <p style={{ "minWidth": 300 }}>{tableProps.row.original.description}</p>
                    </>

                )

            }, {
                Header: 'Category',
                accessor: 'category',
                Cell: tableProps => (
                    <>
                        <a href={'/category/'+tableProps.row.original.category.id} className="text-primary">{tableProps.row.original.category.name}</a>
                    </>
                )

            }, {
                Header: 'Brand',
                accessor: 'brand',
                Cell: tableProps => (
                    <>
                        <a href='#' className="text-primary">{tableProps.row.original.brand.name}</a>
                    </>
                )
            }, {
                Header: 'Stock',
                accessor: 'size',
                Cell: tableProps => (
                    <>

                        <a href='#' className='text-primary '>{tableProps.row.original.stocks_count}</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        {tableProps.row.original.stocks_count < 1 ?
                    //     <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                    //     Tooltip on top
                    //   </button>

                                <svg xmlns="http://www.w3.org/2000/svg" class="text-danger icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 9v2m0 4v.01"></path>
                                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
                                </svg>

                            : <></>}

                    </>

                )

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
            data
        },
        useGlobalFilter, useSortBy, usePagination
    )
    const { globalFilter, pageIndex } = state
    return (
        <div>
            <div className="pt-3 ">
                <div className="d-flex">
                    <div>
                        {/* TODO: data-bs-target dibikin props */}
                        <button data-bs-toggle="modal" data-bs-target="#createPartModal" class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            New Part
                        </button>
                    </div>

                    <TableSearch
                        globalFilter={globalFilter}
                        setGlobalFilter={setGlobalFilter} />

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
                <TableLoading/>
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

export default Parts;

if (document.getElementById('parts')) {
    ReactDOM.render(<Parts />, document.getElementById('parts'));
}
