import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useGlobalFilter, useSortBy, useFilters } from 'react-table'
import TabelFooter from '../../components/tabel_footer';
import Table from '../../components/Table';
import TabelHiddenColumn from '../../components/table_hidden_column';
import TableSearch from '../../components/table_search';
import Api from '../../utils/api';
import Filter from '../../utils/filter';

function Category() {
    const api = new Api;
    const filter = new Filter;
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getCategory().then((response) => {
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
        let result = filter.noStock(noStock,rawData);
        setData(result);
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

        () => [

            {

                //Add this line to the column definition
                Header: 'Name',
                accessor: 'name',
                style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: tableProps => (
                    <>
                            <a href={"/category/" + tableProps.row.original.id} className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.name}</a>
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

            }, 
            {
                Header: 'Total Part',
                accessor: 'total_part',
                Cell: tableProps => (
                    <>

                        <a href='#' className='text-primary '>{tableProps.row.original.parts.length}</a>

                       

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
                        <button data-bs-toggle="modal" data-bs-target="#createCategoryModal" class="btn btn-primary w-100">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                      </svg>
                      New Category
                    </button>
                    </div>
                    <TableSearch
                        columns={columns}
                        SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter}/>
                        
                    <div className='px-1'></div>
                    {/* <div class="btn-group h-25 ">
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
                    <div className='px-1'></div> */}

                    <TabelHiddenColumn
                        allColumns={allColumns} />
                </div>
            </div>
            {loadingData ? (
                <p>Loading Please wait...</p>
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

export default Category;

if (document.getElementById('part-category')) {
    ReactDOM.render(<Category />, document.getElementById('part-category'));
}
