import Typewriter from 'typewriter-effect';

export function Title() {
    const title = 'code rewiew pals />';

    return (
        <Typewriter
            onInit={(typewriter) => {
                typewriter

                    .typeString(title)

                    .start();
            }}
        />
    );
}
