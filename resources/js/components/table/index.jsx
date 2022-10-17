function Table(props) {
    return (
        <>
            <div className="">
                <table
                    {...props.getTableProps()}
                    className="table table-report -mt-2"
                >
                    <thead>
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
                                        {/* <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-sm text-dark icon-thick"
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
                                            <polyline points="6 15 12 9 18 15"></polyline>
                                        </svg> */}
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
                                    // <tr class="intro-x">
                                      
                                    // </tr>
                                    
                                    <tr {...row.getRowProps()} class="intro-x">
                                        {row.cells.map((cell) => {
                                            return (
                                                <td
                                                    {...cell.getCellProps()}
                                                    className="align-middle"
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
        </>
    );
}

export default Table;
