import { Children } from 'react';

export default function DashboardModal({ thirdPartyModal, closeThirdPartyModal, children }) {
    const setOpenModal = () => {
        closeThirdPartyModal();
    };
    return (
        <>
            <div className="fixed inset-0 z-10 overflow-y-auto">
                <div
                    className="fixed inset-0 w-full h-full bg-black opacity-40"
                    onClick={() => setOpenModal(false)}
                ></div>
                <div className="flex items-center min-h-screen px-4 py-8">
                    <div className="relative w-full max-w-lg p-4 mx-auto bg-white rounded-md shadow-lg">
                        {children}
                    </div>
                </div>
            </div>
        </>
    );
}
