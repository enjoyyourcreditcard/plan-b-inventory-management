import React, { useEffect, useState } from "react";
import Select from "react-select";
import ReactDOM from "react-dom";
import Api from "../../../utils/api";

// getRequestFormByGRF

function TransactionForm(props) {
    const api = new Api();
    const [loadingData, setLoadingData] = useState(true);
    const [data, setData] = useState([]);

     const options = [
            { value: "chocolate", label: "Chocolate" },
            { value: "strawberry", label: "Strawberry" },
            { value: "vanilla", label: "Vanilla" },
        ];
    // const children = [[], []];

    for (let i = 0; i < data.length; i++) {
        data[i].select_array = [];
        data[i].select_qty = 0;
        data[i].select_array.push(<Select options={options} />);

    }

    // for (let i = 0; i < numChildren_2; i++) {
    //     children[1].push(<Select options={options} />);
    // }

    useEffect(() => {
        async function getData() {
            api.getRequestFormByGRF(props.grfcode).then((response) => {
                console.log(response.data.data);
                setData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    }, []);

    const SelectComponent = (option) => {
        return <Select options={option} />;
    };

    const addSelect = (index) => {
        data[index].select_qty = data[index].select_qty +1;
        // const options = [
        //     { value: "chocolate", label: "Chocolate" },
        //     { value: "strawberry", label: "Strawberry" },
        //     { value: "vanilla", label: "Vanilla" },
        // ];
        // data[].select_array.push(<Select options={options} />);

        // data[index].select_array.push();
        // console.log(data[index].select_array[0]);
    };
    return (
        <>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>

                        <th class="col-3">SEGMENT</th>
                        <th class="col-3">PART </th>
                        <th class="col-2">TOTAL ITEM</th>
                        <th class="col-10">QUANTITY </th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    {data.map((item, index) => {
                        return (
                            <tr key={index}>
                                <td>{index + 1}</td>
                                <td>{item.segment.name}</td>
                                <td>
                                    {item.select_array}
                                    <button
                                        type="button"
                                        onClick={() => addSelect(index)}
                                    >
                                        tambah{" "}
                                    </button>
                                </td>
                                <td>{item.quantity}</td>

                                <td>
                                    <input className="form-control" />
                                </td>
                                <td>asdas</td>
                            </tr>
                        );
                    })}
                </tbody>
            </table>
        </>
    );
}

if (document.getElementById("transaction-ic-form")) {
    // ReactDOM.render(
    //     <TransactionForm />,
    //     document.getElementById("transaction-ic-form")
    // );

    const propsContainer = document.getElementById("transaction-ic-form");
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(
        <TransactionForm {...props} />,
        document.getElementById("transaction-ic-form")
    );
}
