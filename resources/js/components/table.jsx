function Table(props) {
    return (
        <>
            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                <table
                    {...props.getTableProps()}
                    // style={{ position: "relative", borderCollapse: "collapse" }}
                    className="table table-report -mt-2 overflow-scroll w-full"
                >
                    <thead className="sticky top-0">
                        {props.headerGroups.map((headerGroup) => (
                            <tr {...headerGroup.getHeaderGroupProps()}>
                                {headerGroup.headers.map((column) => (
                                    <th
                                        class="whitespace-nowrap uppercase"
                                        {...column.getHeaderProps(
                                            column.getSortByToggleProps()
                                        )}
                                    >
                                        {column.render("Header")}
                                    </th>
                                ))}
                            </tr>
                        ))}
                    </thead>
                    <tbody {...props.getTableBodyProps()}>
                        {props.page == "" ? (
                            <>
                                <tr>
                                    <td
                                        colspan="100%"
                                        style={{ textAlign: "center" }}
                                    >
                                        No records found
                                    </td>
                                </tr>
                            </>
                        ) : (
                            props.page.map((row, i) => {
                                props.prepareRow(row);
                                return (
                                    <tr {...row.getRowProps()} class="intro-x">
                                        {row.cells.map((cell) => {
                                            return (
                                                <td
                                                    {...cell.getCellProps()}
                                                    className="align-middle"
                                                    style={{ fontSize: "12px" }}
                                                >
                                                    {cell.render("Cell")}
                                                </td>
                                            );
                                        })}
                                    </tr>
                                );
                            })
                        )}
                    </tbody>
                </table>
            </div>
            {/* <div className="overflow-x">
              
            </div> */}
        </>
    );
}

export default Table;
