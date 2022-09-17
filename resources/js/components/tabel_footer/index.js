function TabelFooter(props) {
    return (<>
        <div className=" d-flex align-items-center">
            <p className="m-0 ">Showing <span>{props.pageIndex + 1}</span>  of <span>{props.pageOptions.length}</span> entries</p>
          <div className="pagination m-0 ms-auto">

            <div class="btn-group ">
                {/* <a href="#" class="btn btn-white btn-icon" aria-label="Button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 5h6a3.5 3.5 0 0 1 0 7h-6z"></path><path d="M13 12h1a3.5 3.5 0 0 1 0 7h-7v-7"></path></svg>
                </a>
                 */}
                 {/* disabled={!props.canPreviousPage}  */}
                  <button onClick={() => props.previousPage()} className="btn btn-outline-dark  " href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                        prev
                    </button>
                    {/* disabled={!props.canNextPage} */}
                    <button  className="btn btn-outline-dark" href="#" onClick={() => props.nextPage()}>
                        next
                        <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                    </button>
            </div>
          </div>

            {/* <ul className="pagination m-0 ms-auto">
                <li className="page-item ">
                    <button disabled={!props.canPreviousPage} onClick={() => props.previousPage()} className="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                        prev
                    </button>
                </li>
                {props.pageOptions.map((item) => {
                    return <li className="page-item"><button className={item + 1 === props.pageIndex + 1 ? "page-link bg-primary text-white" : "page-link "} onClick={() => {
                        props.gotoPage(item)
                    }}>{item + 1}</button></li>
                })}
                <li className="page-item">
                    <button disabled={!props.canNextPage} className="page-link" href="#" onClick={() => props.nextPage()}>
                        next
                        <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                    </button>
                </li>
            </ul> */}
        </div></>);
}

export default TabelFooter;