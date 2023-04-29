function Button({ text, size, color, logo, alt }) {
    const className = `${size} ${color} inline-block mr-2`;
    return (
        <button className="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <img className={className} src={logo} alt={alt} />
            {text}
        </button>
    );
}

export default Button;
