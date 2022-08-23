import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useGlobalFilter, useSortBy, useFilters } from 'react-table'
import TabelFooter from '../../components/tabel_footer';
import Table from '../../components/Table';
import TabelHiddenColumn from '../../components/table_hidden_column';
import TableSearch from '../../components/table_search';
import ReactModal from 'react-modal';

function DetailPart() {
    const rawData = React.useMemo(
        () => [
            {
                ipn: "-",
                part: "1551ABK",
                img: "/demo/part_images/1551mini-photo.thumbnail.jpg",
                description: "Small plastic enclosure, black	",
                category: "Mechanical/Enclosures",
                stock: 0,
                link: "-",
            },
            {
                ipn: "-",
                part: "1551ACLR",
                img: "/demo/part_images/1551aclr.thumbnail.jpg",
                description: "Small plastic enclosure, clear",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "1551AGY",
                img: "/demo/part_images/1551agy.thumbnail.jpg",
                description: "Plastic enclosure, grey	",
                category: "Mechanical/Enclosures",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "1553WDBK",
                img: "/demo/part_images/1553wdbkab.thumbnail.jpg",
                description: "Water tight handheld enclosure	",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            }, {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "Bla blaPinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHe dasd ersad 0asdas asdas sadasda sx2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "aMale pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "bMale pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "AMale pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 0,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 0,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: 25,
                link: "-",
            },
        ],
        []
    )

    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState(rawData);
    const [modalAddStock, setModalAddStock] = useState(true);



    function filterNoStock() {
        let data = noStock ? rawData : rawData.filter((i) => i.stock === 0)
        setData(data);
        setNoStock(!noStock);
    }
    const columns = React.useMemo(

        () => [
            {
                Header: 'IPN',
                accessor: 'ipn',

            },
            {

                //Add this line to the column definition
                Header: 'Part',
                accessor: 'part',
                style: { 'maxWidth': 10 },//Add this line to the column definition

                Cell: tableProps => (
                    <>
                        <div id="thumbwrap" >
                            <a class="thumb" href="#"><img src={tableProps.row.original.img} alt="" width={30} height={25} style={{ border: "1px solid #CCCCEE" }} />
                                <span>
                                    <img src={tableProps.row.original.img} alt="" style={{ border: "1px solid #CCCCEE" }} />
                                </span>
                            </a>
                            <a href='#' className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.part}</a>
                        </div>





                    </>

                )
            }, {
                Header: 'Description',
                accessor: 'description',

                Cell: tableProps => (
                    <>
                        <p style={{ "minWidth": 300 }}>{tableProps.row.original.description}</p>
                        {/* <a href='#' className="text-primary">{tableProps.row.original.category}</a> */}
                    </>

                )

            }, {
                Header: 'Category',
                accessor: 'category',
                Cell: tableProps => (
                    <>
                        <a href='#' className="text-primary">{tableProps.row.original.category}</a>
                    </>

                )

            }, {
                Header: 'Stock',
                accessor: 'stock',
                Cell: tableProps => (
                    <>
                        <a href='#' className='text-primary '>{tableProps.row.original.stock}</a>
                        {/* 25 : <span class="badge bg-danger ">No Stock</span> */}
                        {/* <a href='#' className="text-primary">{tableProps.row.original.stock}</a> */}
                    </>

                )

            },
            {
                Header: 'Link',
                accessor: 'link',

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
            <ReactModal
                isOpen={modalAddStock}
                contentLabel="Minimal Modal Example"
                style={{
                    overlay: {
                        position: 'fixed',
                        top: 0,
                        left: 0,
                        right: 0,
                        bottom: 0,
                        backgroundColor: 'rgba(255, 255, 255, 0.75)'
                    },
                    content: {
                        margin: "auto",
                        width: "65%",
                        padding: 0,
                        //   left: 1000,

                        //   position: 'absolute',
                        //   top: '40px',
                        //   left: '40px',
                        //   right: '40px',
                        //   bottom: '40px',
                        //   border: '1px solid #ccc',
                        //   background: '#fff',
                        //   overflow: 'auto',
                        //   WebkitOverflowScrolling: 'touch',
                        //   borderRadius: '4px',
                        //   outline: 'none',
                        //   padding: '20px'
                    }
                }}
            >
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h5 class="h2 mt-2">New Stock Item</h5>
                        <button type="button" onClick={(e)=>{setModalAddStock(false)}} class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {/* <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi beatae delectus deleniti dolorem eveniet facere fuga iste nemo nesciunt nihil odio perspiciatis, quia quis reprehenderit sit tempora totam unde.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div> */}
                </div>
                {/* <button onClick={(e)=>{setModalAddStock(false)}}>Close Modal</button> */}
            </ReactModal>
            <div className="pt-3 ">
                <div className="d-flex">
                    <div>
                        <button onClick={(e) => { setModalAddStock(true) }} class="btn btn-primary w-100">
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
            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page} />

            <TabelFooter
                gotoPage={gotoPage}
                pageIndex={pageIndex}
                pageOptions={pageOptions}
                canPreviousPage={canPreviousPage}
                previousPage={previousPage}
                canNextPage={canNextPage}
                nextPage={nextPage} />
            {/* <div>
                <button onClick={() => gotoPage(0)} disabled={!canPreviousPage}>
                    {"<<"}
                </button>{" "}
                <button onClick={() => previousPage()} disabled={!canPreviousPage}>
                    Previous
                </button>{" "}
                <button onClick={() => nextPage()} disabled={!canNextPage}>
                    Next
                </button>{" "}
                <button onClick={() => gotoPage(pageCount - 1)} disabled={!canNextPage}>
                    {">>"}
                </button>{" "}
                <span>
                    Page{" "}
                    <strong>
                        {pageIndex + 1} of {pageOptions.length}
                    </strong>{" "}
                </span>
                <span>
                    | Go to page:{" "}
                    <input
                        type="number"
                        defaultValue={pageIndex + 1}
                        onChange={(e) => {
                            const pageNumber = e.target.value
                                ? Number(e.target.value) - 1
                                : 0;
                            gotoPage(pageNumber);
                        }}
                        style={{ width: "50px" }}
                    />
                </span>{" "}
                <select
                    value={pageSize}
                    onChange={(e) => setPageSize(Number(e.target.value))}
                >
                    {[10, 25, 50].map((pageSize) => (
                        <option key={pageSize} value={pageSize}>
                            Show {pageSize}
                        </option>
                    ))}
                </select>
            </div> */}


        </div>
    );
}

export default DetailPart;

if (document.getElementById('detail-part')) {
    ReactDOM.render(<DetailPart />, document.getElementById('detail-part'));
}
