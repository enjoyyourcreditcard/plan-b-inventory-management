import { useEffect, useState } from "react";
import Api from "../../utils/api";


const SearchSelectCategory = (props) => {
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const api = new Api;
    useEffect(async () => {
        async function getData() {
            api.getCategorySelect().then((response) => {
                setRawData(response.data.data)
                setLoadingData(false);
            })
        }
        if (loadingData) {
            getData();
        }

    })

    return (<select className="form-control" onChange={(e) => (props.SearchFilter(e.target.value, props.searchColumnID))}>
        <option>All</option>
        {rawData.map((item, i) => {
            return <option key={i} name={item}>{item}</option>
        })}
    </select>)
}

const SearchSelectBrand = (props) => {
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const api = new Api;
    useEffect(async () => {
        async function getData() {
            api.getBrandSelect().then((response) => {
                setRawData(response.data.data)
                setLoadingData(false);
            })
        }
        if (loadingData) {
            getData();
        }

    })

    return (<select className="form-control" onChange={(e) => (props.SearchFilter(e.target.value, props.searchColumnID))}>
        <option>All</option>
        {rawData.map((item, i) => {
            return <option key={i} name={item}>{item}</option>
        })}
    </select>)
}

const SearchSelectSN = (props) => {
    return (<select className="form-control" onChange={(e) => (props.SearchFilter(e.target.value, props.searchColumnID))}>
        <option>All</option>
        <option>SN</option>
        <option>NON SN</option>
       
    </select>)
}




function TableSearch(props) {
    const [searchColumn, setSearchColumn] = useState(props.columns[0].Header);
    const [search, setSearch] = useState("");
    const [searchColumnID, setSearchColumnID] = useState(props.columns[0].accessor);
    const [column, setColumn] = useState(props.columns);



    return (
        <>
            <div className="ms-auto text-muted mb-3">
                <div class="input-group">
                    {searchColumnID === "category" || searchColumnID === "category_name" ? <SearchSelectCategory searchColumnID={searchColumnID} SearchFilter={props.SearchFilter} />
                        :  searchColumnID === "brand"  || searchColumnID === "brand_name"? 
                        <SearchSelectBrand searchColumnID={searchColumnID} SearchFilter={props.SearchFilter} />
                        :  searchColumnID === "sn_status" ?
                        <SearchSelectSN searchColumnID={searchColumnID} SearchFilter={props.SearchFilter} />
                        :
                        <input type="text" class="form-control" placeholder="Search…" value={search} onChange={(e) => (props.SearchFilter(e.target.value, searchColumnID), setSearch(e.target.value))} />
                    }
                    <button data-bs-toggle="dropdown" type="button" class="btn dropdown-toggle ">{searchColumn}</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        {column.map((item, i) => {
                            return (
                                <button class="dropdown-item" href="#" onClick={(e) => (setSearchColumn(item.Header), setSearchColumnID(item.accessor), setSearch(""), props.resetSearchFilter())}>
                                    {item.Header}
                                </button>)
                        })}
                    </div>
                </div>
            </div>

        </>
    );
}

export default TableSearch;