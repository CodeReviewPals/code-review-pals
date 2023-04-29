import { Title } from '@/Components/TItle/Title';

import logo from '../../../images/mainLogo.png';
import logoGithub from '../../../images/dashboard/github.svg';

import './style.css';

export function Header() {
    return (
        <header className="flex items-center justify-between mx-4 mt-2">
            <div className="title flex items-center">
                <img className="w-16" src={logo} alt="Logo code reviews pals" />
                <Title />
            </div>
            <nav>
                <button className="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    <img className="w-8 inline-block mr-2" src={logoGithub} alt="Logo GitHub" />
                    Connect
                </button>
            </nav>
        </header>
    );
}
