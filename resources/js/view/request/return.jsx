import ReactDOM from "react-dom";

const Return = () => {
    return (
        <>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima illum voluptatibus deleniti ut. Magnam quo enim ipsum! Quae unde, est quaerat aliquam sequi ullam nostrum ea tenetur quis sit exercitationem!
        </>
    )
}

export default Return;

if (document.getElementById("request-return")) {
    ReactDOM.render(<Return />, document.getElementById("request-return"));
}