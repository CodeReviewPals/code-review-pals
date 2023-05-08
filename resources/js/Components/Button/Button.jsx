function Button({ text, size, color, logo, alt, divers }) {
    const className = `${size} ${color} ${divers} inline-block mr-2`;

    if (!divers) {
        return (
            <button className="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <img className={className} src={logo} alt={alt} />
                {text}
            </button>
        );
    } else {
        return (
            <button className="bg-gray-200 hover:bg-gray-200 text-black  font-bold py-2 px-4 rounded border">
                <img className={className} src={logo} alt={alt} />
                {text}
            </button>
        );
    }
}

export default Button;
