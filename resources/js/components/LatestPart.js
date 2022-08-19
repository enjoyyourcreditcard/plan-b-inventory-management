import React from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useGlobalFilter, useSortBy } from 'react-table'
import Table from './Table';
import TabelHiddenColumn from './table_hidden_column';
import TableSearch from './table_search';
function LatestPart() {

    const data = React.useMemo(
        () => [
            {
                ipn: "-",
                part: "1551ABK",
                img: "/demo/part_images/1551mini-photo.thumbnail.jpg",
                description: "Small plastic enclosure, black	",
                category: "Mechanical/Enclosures",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "1551ACLR",
                img: "/demo/part_images/1551aclr.thumbnail.jpg",
                description: "Small plastic enclosure, clear",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "1551AGY",
                img: "/demo/part_images/1551agy.thumbnail.jpg",
                description: "Plastic enclosure, grey	",
                category: "Mechanical/Enclosures",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "1553WDBK",
                img: "/demo/part_images/1553wdbkab.thumbnail.jpg",
                description: "Water tight handheld enclosure	",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            }, {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "Bla blaPinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHe dasd ersad 0asdas asdas sadasda sx2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "aMale pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "bMale pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "AMale pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
            {
                ipn: "-",
                part: "PinHeader_1x03x2.0mm",
                img: "/demo/part_images/assembly.thumbnail.png",
                description: "Male pin header connector, 1 rows, 3 positions, 2.0mm pitch, vertical",
                category: "Electronics/Connectors/Pin Headers",
                stock: "25",
                link: "-",
            },
        ],
        []
    )
    
    const columns = React.useMemo(

        () => [
            {
                Header: 'IPN',
                accessor: 'ipn',

            },
            {
                Header: 'Part',
                accessor: 'part',
                style: { 'maxWidth': 10 },

                Cell: tableProps => (
                    <>
                        <div id="thumbwrap" >
                            <a class="thumb" href="#"><img src={tableProps.row.original.img} alt="" width={35} height={30} style={{ border: "1px solid #CCCCEE" }} />
                                <span>
                                    <img src={tableProps.row.original.img} alt="" style={{ border: "1px solid #CCCCEE" }} />
                                </span>
                            </a>
                            <a href='#' className="text-primary text-decoration-none " > {tableProps.row.original.part}</a>
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
                        <a href='#' className="text-primary">{tableProps.row.original.category}</a>
                    </>

                )

            }, {
                Header: 'Stock',
                accessor: 'stock',
                Cell: tableProps => (
                    <>
                        <p>{tableProps.row.original.stock}</p>
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
        <div className="col-12">
            <div className="card ">
                <div className="pt-3 container">
                    <div className="d-flex">
                        <TableSearch
                            globalFilter={globalFilter}
                            setGlobalFilter={setGlobalFilter} />
                        <div className='px-1'></div>
                        <TabelHiddenColumn
                            allColumns={allColumns} />
                    </div>
                </div>
                <div className="tabel-horizontal-scroll">
                    <Table
                        getTableProps={getTableProps}
                        prepareRow={prepareRow}
                        getTableBodyProps={getTableBodyProps}
                        headerGroups={headerGroups}
                        page={page} />
                </div>
                <div className="card-footer d-flex align-items-center" >
                    <p className="m-0 ">Showing <span>{pageIndex + 1}</span>  of <span>{pageOptions.length}</span> entries</p>
                    <ul className="pagination m-0 ms-auto">
                        <li className="page-item ">
                            <button disabled={!canPreviousPage} onClick={() => previousPage()} className="page-link" href="#" tabindex="-1" aria-disabled="true">

                                <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                                prev
                            </button>
                        </li>
                        <li className="page-item"><a className="page-link" href="#">1</a></li>

                        <li className="page-item">
                            <button disabled={!canNextPage} className="page-link" href="#" onClick={() => nextPage()}>
                                next
                                <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div >
    );
}

export default LatestPart;

if (document.getElementById('latest-part')) {
    ReactDOM.render(<LatestPart />, document.getElementById('latest-part'));
}
